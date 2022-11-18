<?php

class UserModel extends DB
{
    public function InsertNewUser($fullname, $email, $password, $phone_number, $address)
    {
        $result = false;

        if ($fullname == '' || $email == '' || $password == '' || $phone_number == '' || $address == ''  || strlen($password) < 6) {
            return [
                "result" => $result
            ];
        }
        $userExist = $this->executeResult("select * from User where email = '$email'", true);
        if ($userExist != NULL) {
            return [
                "result" => $result
            ];
        } else {
            $qr = "INSERT INTO user(fullname, email, phone, address, password, role_id, deleted)
            VALUES('$fullname','$email','$phone_number','$address','$password',1, 0)";
            $this->execute($qr);
            $result = true;
            return [
                "result" => $result
            ];
        }
    }
 
    public function Authenticate($email, $password)
    {
        $result = false;
        $qr = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $userExist = $this->executeResult($qr, true);
        if ($userExist == null) {
            return [
                "result" => $result
            ];
        } else {

            $_SESSION['user'] = $userExist;

            $result = true;
            return [
                "result" => $result,
                "role_id" => $userExist["role_id"]
            ];
        }
    }
}
