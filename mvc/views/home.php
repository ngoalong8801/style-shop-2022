<?php
require_once "mvc/views/blocks/header.php";

if ($data["render"] == "home") {
    // require_once "mvc/views/components/sliderbar.php";
    require_once "mvc/views/components/showProduct.php";
}
else if ($data["render"] == "productDetail") {
    require_once "mvc/views/components/productDetail.php";
} else if ($data["render"] == "productList") {
    require_once "mvc/views/components/productList.php";
}else if ($data["render"] == "cart") {
    require_once "mvc/views/components/cart.php";
} else if ($data["render"] == "checkout") {
    require_once "mvc/views/components/checkout.php";
} else if ($data["render"] == "about") {
    require_once "mvc/views/components/about.php";
} else if ($data["render"] == "blog") {
    require_once "mvc/views/components/blog.php";
} else if ($data["render"] == "contact") {
    require_once "mvc/views/components/contact.php";
} else if ($data["render"] == "ManageAccount") {
    require_once "mvc/views/components/updateInfoUser.php";
}
 
require_once "mvc/views/blocks/footer.php";