<?php
require_once "mvc/utils/utils.php";

class CategoryModel extends DB{

    public function getCategory(){
        $sql = "select * from category";
        $data = $this->executeResult($sql);
        return $data;
    }

    public function addCategory($name){
        $sql = "insert into Category(name) values ('$name')";
        $this->execute($sql);
    }

    public function updateCategory($name, $id){
        $sql = "update Category set name = '$name' where id = $id";
		$this->execute($sql);
    }

    public function selectCategory($id) {
        $name = '';
        $sql = "select * from category where id = $id";
        $data = $this->executeResult($sql, true);

        if($data != null) {
            $name = $data['name'];
        }
        
        return $name;
    }
}