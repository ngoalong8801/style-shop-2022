<?php
require_once "mvc/utils/utils.php";

class ProductModel extends DB{

    public function getAllProduct($fillter){
        switch($fillter){
            case PRICE_ASC:
                $sql = "select product.*, category.name as category_name 
                    from product left join category on product.category_id = category.id 
                    where product.deleted = 0
                    ORDER BY product.price ASC";
                break;
            case TITLE_ASC:
                $sql = "select product.*, category.name as category_name 
                    from product left join category on Product.category_id = category.id 
                    where product.deleted = 0
                    ORDER BY product.title ASC";
                break;
            case TITLE_DESC:
                $sql = "select product.*, category.name as category_name 
                    from product left join category on product.category_id = category.id 
                    where product.deleted = 0
                    ORDER BY product.title DESC";
                break;
            default:
                $sql = "select product.*, category.name as category_name 
                    from product left join category on product.category_id = category.id 
                    where product.deleted = 0
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

    public function searchProduct($name){

        $sql ="select product.*, category.name as category_name 
                from product left join category on product.category_id = category.id 
                WHERE product.title LIKE '%$name%' 
                order by product.id 
                DESC LIMIT 5 ";
        $searchProducts = $this->executeResult($sql);
        return $searchProducts;
    }

    public function updateProduct($id, $category_id, $title, $price, $discount, $photo, $description) {
        $sql = "update product set title = '$title', price = $price, discount = $discount, description = '$description', category_id = '$category_id', photo = '$photo' where id = $id";
		$this->execute($sql);
    }

    public function selectProductDelete($id) {
        $sql = "delete from product where id = $id";
        $this->execute($sql);
    }
}