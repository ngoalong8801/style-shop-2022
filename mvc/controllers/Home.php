<?php

class Home extends Controller
{
    public $categoryModel;

    // public $categoryModel, $productMode, $allCategory;
    public $cart;

    public function __construct()
    {
        $this->categoryModel = $this->model("CategoryModel");
        $this->allCategory = $this->categoryModel->getCategory();
        $this->productModel = $this->model("ProductModel");
    }

    function GetPage()
    {
        $allProduct = $this->productModel->getAllProduct(PRICE_ASC);
        $this->view("home", [
            "render" => "home",
            "allCategory" => $this->allCategory,
            "allProduct" => $allProduct,
            "cart" => $this->getCart(),
        ]);
    }
    
    function getCart(){
        $cart = [];
        $num = [];
        if (isset($_COOKIE['cart'])) {
            $json = $_COOKIE['cart'];
            $cart = json_decode($json, true);
        }
        $ids = [];
        $map = [];
        foreach ($cart as $item) {
            $ids[] = $item['id'];
            $map[$item['id']] = $item['num']; 
        }
        if (count($ids) > 0) {
            $ids = implode(',', $ids);
            $orderDetails = $this->productModel->getProductOrder($ids);
        } else {
            $orderDetails = [];
        }

        foreach($orderDetails as $order){
            $num[] = $map[$order['id']];
        }

        if ($orderDetails != NULL)
            $countOrder = count($orderDetails);
        else $countOrder = 0;

        return [ "orderDetails" => $orderDetails,
            "countOrder" => $countOrder,
            "allCategory" => $this->allCategory,
            "num" => $num];
    }

    public function productDetail($id)
    {
        $feedbackModel = $this->model("FeedbackModel");
        $feedbackProduct = $feedbackModel->getFeedbackProduct($id);
        $productItem = $this->productModel->selectProduct($id);
        $category_id = $productItem["category_id"];
        $allProductCategory = $this->productModel->selectProductCategory($category_id, 1);
        $productCategory = $this->categoryModel->selectCategory($category_id);
        $this->view("home", [
            "render" => "productDetail",
            "productItem" => $productItem,
            "productCategory" => $productCategory,
            "allProductCategory" => $allProductCategory,
            "category_id" => $category_id,
            "allCategory" => $this->allCategory,
            "feedbackProduct" => $feedbackProduct,
            "cart" => $this->getCart(),
        ]);
    }

    public function productList($category_id = 0, $fillter = PRICE_DESC)
    {
    
        
        $allProduct = $this->productModel->getAllProduct(PRICE_ASC);

        $this->view("home", [
            "render" => "productList",
            "allProduct" => $allProduct,
            "allCategory" => $this->allCategory,
            "cart" => $this->getCart(),
        ]);
    }


    public function cart()
    {
        $cart = [];
        $num = [];
        if (isset($_COOKIE['cart'])) {
            $json = $_COOKIE['cart'];
            $cart = json_decode($json, true);
        }
        $ids = [];
        $map = [];
        foreach ($cart as $item) {
            $ids[] = $item['id'];
            $map[$item['id']] = $item['num']; 
        }
        if (count($ids) > 0) {
            $ids = implode(',', $ids);
            $orderDetails = $this->productModel->getProductOrder($ids);
        } else {
            $orderDetails = [];
        }

        foreach($orderDetails as $order){
            $num[] = $map[$order['id']];
        }

        if ($orderDetails != NULL)
            $countOrder = count($orderDetails);
        else $countOrder = 0;
        $this->view("home", [
            "render" => "cart",
            "orderDetails" => $orderDetails,
            "countOrder" => $countOrder,
            "allCategory" => $this->allCategory,
            "num" => $num,
            "cart" => $this->getCart(),
        ]);
    }


    public function addToCart()
    {
        header('Location: http://localhost/style-shop-2022/Login');
        if (!empty($_POST)) {
            $id = getPost('productId');
            $num = getPost('num');

            $cart = [];
            if (isset($_COOKIE['cart'])) {
                $json = $_COOKIE['cart'];
                $cart = json_decode($json, true);
            }

            $isFind = false;
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['id'] == $id) {
                    $cart[$i]['num'] += $num;
                    $isFind = true;
                    break;
                }
            }

            if (!$isFind) {
                $cart[] = [
                    'id' => $id,
                    'num' => $num
                ];
            }
            setcookie('cart', json_encode($cart), time() + 30 * 24 * 60 * 60, '/');
        }
    }

    public function deleteCart()
    {
        if (!empty($_POST)) {
            $id = getPost('productId');

            $cart = [];
            if (isset($_COOKIE['cart'])) {
                $json = $_COOKIE['cart'];
                $cart = json_decode($json, true);
            }

            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['id'] == $id) {
                    array_splice($cart, $i, 1);
                    break;
                }
            }
            setcookie('cart', json_encode($cart), time() + 30 * 24 * 60 * 60, '/');
        }
    }

    public function updateCart()
    {
        if (!empty($_POST)) {
            $id = getPost('productId');
            $action = getPost('action');

            $cart = [];
            if (isset($_COOKIE['cart'])) {
                $json = $_COOKIE['cart'];
                $cart = json_decode($json, true);
            }

            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['id'] == $id) {
                    if($action == "MINUS"){
                        $cart[$i]['num']--;
                    }
                    else{
                        $cart[$i]['num']++;
                    }
                    break;
                }
            }
            setcookie('cart', json_encode($cart), time() + 30 * 24 * 60 * 60, '/');
        }
    }

    public function checkout($total)
    {

        $this->view("home", [
            "render" => "checkout",
            "allCategory" => $this->allCategory,
            "totalMoney" => $total
        ]);
    }

    public function search()
    {
        if (isset($_POST["action"])) {

            $search_name = $_POST["search_name"];

            $result = $this->productModel->searchProduct($search_name);
        
            $output = '';
            if(count($result) > 0) {
            foreach ($result as $rows) {
                $output .= '
                <li style="margin: 5px 0;" class="list-group">
                    <div style="margin: 0 auto;" class="row">
                        <div class="col-4" style="">
                            <div class="image">
                            <a href="http://localhost/style-shop-2022/Home/productDetail/' . $rows["id"] . '"><img src="' . $rows["photo"] . '" style="width: 75%;padding-right: 0;"></a>
                            </div>
                        </div>
                        <div class="col-8" style="">
                            <div class="name-product">
                                <a href="http://localhost/style-shop-2022/Home/productDetail/' . $rows["id"] . '">' . $rows["title"] . '</a>
                            </div>
                            <div class="price">
                                <p>' . number_format($rows["price"]) . '&nbspVNĐ</p>
                            </div>
                        </div>
                    </div>
                </li>
                ';
            }
        }
           
               else{
                $output .= '<li style="margin: 5px 0; text-align: center" class="list-group">
                Không tìm thấy sản phẩm</li>';
               }
            echo $output;
        }
    }

    public function about()
    {

        $this->view("home", [
            "render" => "about",
            "allCategory" => $this->allCategory,
            "cart" => $this->getCart(),
        ]);
    }

    public function blog()
    {
         $allProduct = $this->productModel->getAllProduct(PRICE_ASC);


        $this->view("home", [
            "render" => "blog",
            "allCategory" => $this->allCategory,
            "cart" => $this->getCart(),
             "allProduct" => $allProduct,

        ]);
    }

    public function contact()
    {  
        $this->view("home", [
            "render" => "contact",
            "allCategory" => $this->allCategory,
            "cart" => $this->getCart(),
           
        ]);
    }


    public function search_button()
    {
        if (isset($_POST)) {
            $page = 1;
            $search_name = $_POST["search_name"];
            $allProductCategory = $this->productModel->searchProduct($search_name);
    
            $category_id = $fillter = 0;
            $this->view("home", [
                "render" => "productList",
                "allProduct" => $allProductCategory,
                "allCategory" => $this->allCategory,
                "category_id" => $category_id,
                "fillter" => $fillter,
                "cart" => $this->getCart(),
            ]);
        }
    }

    public function ManageAccount()
    {
        $this->view("home", [
            "render" => "ManageAccount", 
            "allCategory" => $this->allCategory
        ]);
    }

    public function confirmOrder($orderId, $user_id)
    {
        $orderSuccessModel = $this->model("OrderModel");
        $orderSuccessModel->updateStatusOrder($orderId);
        $orderItem = $orderSuccessModel->getorders($user_id);

        $this->view("home", [
            "render" => "quanlydonhang",
            "allCategory" => $this->allCategory,
            "orderItem" => $orderItem
        ]);
    }
}