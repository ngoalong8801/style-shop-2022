<?php
require_once "mvc/utils/utils.php";
class CategoryAdmin extends Controller
{

    public $categoryModel;

    public function __construct()
    {
        $this->categoryModel = $this->model("CategoryModel");
    }

    public function GetPage($deleteSuccess = 0)
    {
        $category = $this->categoryModel->getCategory();
        $this->view("category/categoryAdmin", [
            "category" => $category,
            "deleteSuccess" => $deleteSuccess
        ]);
    }

    public function Add()
    {
        $this->view("category/add", []);
    }

    public function PostAdd()
    {
        if (isset($_POST)) {
            $name = getPost("name");
            $this->categoryModel->addCategory($name);
        }
        header('Location: http://localhost/style-shop-2022/CategoryAdmin');
    }

    public function ViewEdit($id)
    {
        $name = '';
        $name = $this->categoryModel->selectCategory($id);
        $this->view("category/updateCategory", [
            "id" => $id,
            "name" => $name
        ]);
    }

    public function PostEdit()
    {
        if (isset($_POST)) {
            $id = getPost('id');
            $name = getPost('name');
            $this->categoryModel->updateCategory($name, $id);
        }
        header('Location: http://localhost/style-shop-2022/CategoryAdmin');
    }

    public function Delete($id)
    {
        $data = $this->categoryModel->selectCategoryDelete($id);
        if ($data)
            header('Location: http://localhost/style-shop-2022/CategoryAdmin');
        else header('Location: http://localhost/style-shop-2022/CategoryAdmin/GetPage/1');
    }

    public function checkDelete($id)
    {
        $data = $this->categoryModel->selectCategoryDelete($id);
        var_dump($data);
        return $data;
    }
}
