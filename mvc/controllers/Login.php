<?php
require_once "mvc/utils/utils.php";
class Login extends Controller
{

    public $UserModel;

    public function __construct()
    {
        $this->UserModel = $this->model("UserModel");
    }

    public function GetPage()
    {
        $this->view("login", []);
    }

    public function UserLogin()
    {

        if (isset($_POST["btnLogin"])) {
            // get data
            $email = getPost('email');
            $password = getPost('password');


            $kq = $this->UserModel->Authenticate($email, $password);

            //show home

            if ($kq["result"]) {
                if ($kq["role_id"] == 1) {
                    header('Location: http://localhost/style-shop-2022/Home');
                } else {
                    header('Location: http://localhost/style-shop-2022/OrderAdmin');
                }
            } else {
                header('Location: http://localhost/style-shop-2022/Login');
            }
        }
    }

    public function UserLogout()
    {  
        session_destroy();
        header('Location: http://localhost/style-shop-2022/Home');
    }
}
