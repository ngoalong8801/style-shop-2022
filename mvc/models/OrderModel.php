<?php
require_once "mvc/utils/utils.php";
class OrderModel extends DB
{
    public function insertOrders($user_id, $fullname, $address, $phone, $email, $totalMoney)
    {
        //insert
        $created_at = date("Y-m-d H:i:s");
        $sql = "insert into orders(user_id, fullname, address, phone, email, created_at, total_money) values ('$user_id','$fullname', '$address','$phone','$email','$created_at','$totalMoney')";
        $this->execute($sql);
    }

    public function insertOrderDetail($order_id, $product_id, $price, $num, $totalMoney)
    {
        //insert
        $sql = "INSERT INTO order_details(order_id, product_id, price, num, total_money) 
                VALUES ('$order_id','$product_id','$price','$num','$totalMoney')";
        $this->execute($sql);
    }

    public function getOrderId($user_id)
    {
        $sql = "SELECT  orders.id
                FROM orders 
                WHERE orders.user_id=$user_id
                ORDER BY orders.id DESC
                LIMIT 1";
        $orderItem = $this->executeResult($sql);
        return $orderItem;
    }

}