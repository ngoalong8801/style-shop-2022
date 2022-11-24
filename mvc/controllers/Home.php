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


    public function Card()
    {
        $cart = [];
        $num = [];
        if (isset($_COOKIE['cart'])) {
            $json = $_COOKIE['cart'];
            $cart = json_decode($json, true);
        }
        $idList = [];
        foreach ($cart as $item) {
            $idList[] = $item['id'];
            $num[] = $item['num'];
        }
        if (count($idList) > 0) {
            $idList = implode(',', $idList);
            //[2, 5, 6] => 2,5,6
            $orderDetails = $this->productModel->getProductOrder($idList);
        } else {
            $orderDetails = [];
        }

        if ($orderDetails != NULL)
            $countOrder = count($orderDetails);
        else $countOrder = 0;
        $this->view("home", [
            "render" => "card",
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
}