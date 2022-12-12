<?php
require_once "mvc/utils/utils.php";
class UserAdmin extends Controller
{

    public $userModel;

    public function __construct()
    {
        $this->userModel = $this->model("UserAdminModel");
    }

    public function GetPage()
    {
        $allUser = $this->userModel->getAllUser();
        $this->view("user/userAdmin", [
            "allUser" => $allUser
        ]);
    }

    public function deletedUser($id)
    {
        $this->userModel->deletedUser($id);
        header('Location: http://localhost/style-shop-2022/UserAdmin');
    }

    public function ViewEdit($id)
    {
        $userItem = $this->userModel->selectUser($id);
        $role = $this->userModel->getRole();
        $this->view("user/updateUser", [
            "userItem" => $userItem,
            "role" => $role
        ]);
    }

    public function PostEdit()
    {
        if (isset($_POST)) {
            $id = getPost('id');
            $fullname = getPost('fullname');
            $email = getPost('email');
            $phone= getPost('phone');
            $address = getPost('address');
            $password = getPost('password');
            $role_id = getPost('role_id');
            if (isset($_POST['avatar'])) {
                $avatar = getPost('avatar');
            } else {
                $avatar = 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png';
            }
            $location = getPost('updateInfoUser');
 
            $result = $this->userModel->updateuser($id, $fullname, $email, $role_id, $phone, $address, $password, $avatar);
            if ($result) {
                $_SESSION['user'] = array("fullname" => $fullname, "email" => $email, 
                "id" => $id, "role_id" => $role_id, "phone" => $phone,
                "address" => $address, "password" => $password, "avatar" => $avatar);
            }
            if ($location == 1) {
                header('Location: http://localhost/style-shop-2022/Home/ManageAccount');
            } else header('Location: http://localhost/style-shop-2022/UserAdmin');

        }
    }

    public function ViewAdd()
    {
        $id = 0;
        $userItem = $this->userModel->selectUser($id);
        $role = $this->userModel->getRole();
        $this->view("user/addUser", [
            "userItem" => $userItem,
            "role" => $role
        ]);
    }

    public function PostAdd()
    {
        if (isset($_POST)) {
            $fullname = getPost('fullname');
            $email = getPost('email');
            $phone = getPost('phone');
            $address = getPost('address');
            $password = getPost('password');
            $role_id = getPost('role_id');
            $result = $this->userModel->addUser($fullname, $email, $role_id, $phone, $address, $password);
        }
        header('Location: http://localhost/style-shop-2022/UserAdmin');
    }
}
