<?php
require_once "mvc/utility/utility.php";

class ProductModel extends DB{

    public function getAllProduct($fillter){
        switch($fillter){
            case PRICE_ASC:
                $sql = "select Product.*, Category.name as category_name 
                    from Product left join Category on Product.category_id = Category.id 
                    where Product.deleted = 0
                    ORDER BY product.price ASC";
                break;
            case TITLE_ASC:
                $sql = "select Product.*, Category.name as category_name 
                    from Product left join Category on Product.category_id = Category.id 
                    where Product.deleted = 0
                    ORDER BY product.title ASC";
                break;
            case TITLE_DESC:
                $sql = "select Product.*, Category.name as category_name 
                    from Product left join Category on Product.category_id = Category.id 
                    where Product.deleted = 0
                    ORDER BY product.title DESC";
                break;
            default:
                $sql = "select Product.*, Category.name as category_name 
                    from Product left join Category on Product.category_id = Category.id 
                    where Product.deleted = 0
                    ORDER BY product.price DESC";
        }
        
	    $data = $this->executeResult($sql);
        return $data;
    }

    public function selectProductCategory($id, $fillter){
        switch($fillter){
            case PRICE_ASC:
                $sql = "select * from product where category_id = '$id' and deleted = 0
                    ORDER BY product.price ASC";
                break;
            case TITLE_ASC:
                $sql = "select * from product where category_id = '$id' and deleted = 0
                    ORDER BY product.title ASC";
                break;
            case TITLE_DESC:
                $sql = "select * from product where category_id = '$id' and deleted = 0
                    ORDER BY product.title DESC";
                break;
            default:
                $sql = "select * from product where category_id = '$id' and deleted = 0
                    ORDER BY product.price DESC";
        }
      
        $allProduct = $this->executeResult($sql);
        return $allProduct;
    }

    public function selectProduct($id){
        $sql = "select * from product where id = '$id' and deleted = 0";
        $userItem = $this->executeResult($sql, true);
        return $userItem;
    }

    public function getProductOrder($ids){
        $sql = "select * from product where id in ($ids)";
        $cart = $this->executeResult($sql);
        return $cart;
    }

}