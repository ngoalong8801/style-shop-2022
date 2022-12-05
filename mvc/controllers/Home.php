<?php

class Home extends Controller
{
    public $categoryModel;

    // public $categoryModel, $productMode, $allCategory;

    public function __construct()
    {
        $this->categoryModel = $this->model("CategoryModel");
        $this->allCategory = $this->categoryModel->getCategory();
        $this->productModel = $this->model("ProductModel");
    }

    function GetPage()
    {
        $shirtProduct = $this->productModel->selectProductCategory(1, 1);
        $pantProduct = $this->productModel->selectProductCategory(2, 1);
        $sandalProduct = $this->productModel->selectProductCategory(3, 1);
        $hatProduct = $this->productModel->selectProductCategory(4, 1);
        $glassProduct = $this->productModel->selectProductCategory(5, 1);
        $otherProduct = $this->productModel->selectProductCategory(6, 1);
        $this->view("home", [
            "render" => "home",
            "allCategory" => $this->allCategory,
            "shirtProduct" => $shirtProduct,
            "pantProduct" => $pantProduct,
            "sandalProduct" => $sandalProduct,
            "hatProduct" => $hatProduct,
            "glassProduct" => $glassProduct,
            "otherProduct" => $otherProduct
        ]);
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
            "feedbackProduct" => $feedbackProduct
        ]);
    }

    public function productList($category_id = 0, $page = 1, $fillter = PRICE_DESC)
    {
        if ($category_id == 0) {
            for ($i = 0; $i < count($this->allCategory); $i++) {
                $category[$i] = $this->allCategory[$i]["id"];
            }
            $allProduct = $this->productModel->getAllProduct($fillter);
            $currentIndex = ($page - 1) * 12;
            $countAllProduct = count($allProduct);
            $numPages = ceil($countAllProduct / 12);
        } else {
            $allProduct = $this->productModel->selectProductCategory($category_id, $fillter);
            $currentIndex = ($page - 1) * 12;
            $countAllProduct = count($allProduct);
            $numPages = ceil($countAllProduct / 12);
        }

        $this->view("home", [
            "render" => "productList",
            "allProductCategory" => $allProduct,
            "allCategory" => $this->allCategory,
            "category_id" => $category_id,
            "numPages" => $numPages,
            "currentIndex" => $currentIndex,
            "pages" => $page,
            "fillter" => $fillter
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
        foreach ($cart as $item) {
            $ids[] = $item['id'];
            $num[] = $item['num'];
        }
        if (count($ids) > 0) {
            $ids = implode(',', $ids);
            $orderDetails = $this->productModel->getProductOrder($ids);
        } else {
            $orderDetails = [];
        }

        if ($orderDetails != NULL)
            $countOrder = count($orderDetails);
        else $countOrder = 0;
        $this->view("home", [
            "render" => "cart",
            "orderDetails" => $orderDetails,
            "countOrder" => $countOrder,
            "allCategory" => $this->allCategory,
            "num" => $num
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
            $output = '<i style="right: 10px;position: absolute;top: 4px;z-index:9999" class="fas fa-times"></i>';
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
            if ($output == '<i style="right: 10px;position: absolute;top: 4px;z-index:9999" class="fas fa-times"></i>')
                $output .= '<li style="margin: 5px 0;" class="list-group">
                            Không tìm thấy sản phẩm</li>';
            echo $output;
        }
    }

    public function about()
    {

        $this->view("home", [
            "render" => "about",
            "allCategory" => $this->allCategory
        ]);
    }

    public function blog()
    {

        $this->view("home", [
            "render" => "blog",
            "allCategory" => $this->allCategory
        ]);
    }

    public function contact()
    {
        $this->view("home", [
            "render" => "contact",
            "allCategory" => $this->allCategory
        ]);
    }



}