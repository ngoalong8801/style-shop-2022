<?php
require_once "mvc/utils/utils.php";
class FeedbackModel extends DB
{

    public function getFeedbackProduct($id)
    {
        $sql = "SELECT user.fullname, feedback.updated_at,feedback.note, user.avatar
                FROM feedback,user
                WHERE feedback.product_id=$id AND feedback.user_id=user.id";
        $data = $this->executeResult($sql);
        return $data;
    }

    public function addFeedbackProduct($note, $userid, $product_id)
    {
        $updated_at = date("Y-m-d H:i:s");
        $created_at = date("Y-m-d H:i:s");
        $sql = "INSERT INTO feedback (note, user_id, product_id, created_at, updated_at) 
                VALUES ('$note', '$userid', '$product_id', '$created_at', '$updated_at')";
        $this->execute($sql);
    }


    public function updateStatus($id)
    {
        $updated_at = date("Y-m-d H:i:s");
        $sql = "update feedback set status = 1, updated_at = '$updated_at' where id = $id";
        $this->execute($sql);
    }
}
