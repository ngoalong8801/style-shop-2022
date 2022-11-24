<?php
require_once "mvc/views/blocks/header.php";


if ($data["render"] == "home") {
    // require_once "mvc/views/components/sliderbar.php";
    require_once "mvc/views/components/showProduct.php";
}else if ($data["render"] == "productDetail") {
    require_once "mvc/views/components/productDetail.php";
} else if ($data["render"] == "productList") {
    require_once "mvc/views/components/productList.php";
}else if ($data["render"] == "card") {
    require_once "mvc/views/components/card.php";
}

require_once "mvc/views/blocks/footer.php";