<?php

class Home extends Controller
{

    // public $categoryModel, $productMode, $allCategory;

    public function __construct()
    {
        // $this->categoryModel = $this->model("CategoryModel");
        // $this->allCategory = $this->categoryModel->getCategory();
        // $this->productModel = $this->model("ProductModel");
    }

    function GetPage()
    {
        // $productSamsung = $this->productModel->selectProductCategory(1, 1);
        // $productIphone = $this->productModel->selectProductCategory(2, 1);
        // $productXiaomi = $this->productModel->selectProductCategory(3, 1);
        // $productNokia = $this->productModel->selectProductCategory(10, 1);
        // $productHuawei = $this->productModel->selectProductCategory(11, 1);
        // $this->view("home", [
        //     "render" => "home",
        //     "allCategory" => $this->allCategory,
        //     "productHuawei" => $productHuawei,
        //     "productIphone" => $productIphone,
        //     "productSamsung" => $productSamsung,
        //     "productXiaomi" => $productXiaomi,
        //     "productNokia" => $productNokia
        // ]);

        $this->view("home", []);
    }
}