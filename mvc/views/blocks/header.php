<?php
require_once "mvc/utils/utils.php";
if (isset($data["render"])) {
    if ($data["render"] == "ManageAccount")
        $user = getUserSession();
    else $user = getUserSession();
} else $user = getUserSession();
if ($user != null) {
    $fullname = $user["fullname"];
}
$cart = [];
if (isset($_COOKIE['cart'])) {
    $json = $_COOKIE['cart'];
    $cart = json_decode($json, true);
}
$count = 0;
foreach ($cart as $item) {
    $count += $item['num'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home 03</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <link rel="icon" type="image/png"
        href="http://localhost/style-shop-2022/public/http://localhost/style-shop-2022/public/images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="http://localhost/style-shop-2022/public/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="http://localhost/style-shop-2022/public/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="http://localhost/style-shop-2022/public/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css"
        href="http://localhost/style-shop-2022/public/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="http://localhost/style-shop-2022/public/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="http://localhost/style-shop-2022/public/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="http://localhost/style-shop-2022/public/vendor/MagnificPopup/magnific-popup.css">

    <link rel="stylesheet" type="text/css" href="http://localhost/style-shop-2022/public/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="http://localhost/style-shop-2022/public/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->

    <link rel="stylesheet" type="text/css" href="http://localhost/style-shop-2022/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/style-shop-2022/public/css/util.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/style-shop-2022/public/css/main.css">



    <link rel="stylesheet" type="text/css" href="http://localhost/style-shop-2022/public/css/tin.css">


    <!-- Fontawesome -->
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
        href="http://localhost/style-shop-2022/public/http://localhost/style-shop-2022/public/images/favicon.png">
    <!-- Main Style CSS -->
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <!-- Modernizr js -->
    <link href="http://localhost/style-shop-2022/public/fontawesome-free-5.15.4-web/css/all.min.css" rel="stylesheet">
    <!--load all styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
</head>

<body class="animsition">
    <!-- Header -->
    <header class="header-v4">
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <div class="wrap-menu-desktop how-shadow1">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="#" class="logo">
                        <img src="http://localhost/style-shop-2022/public/images/icons/logo-01.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="http://localhost/style-shop-2022/home">Home</a>
                            </li>

                            <li>
                                <a href="http://localhost/style-shop-2022/home/productList">Shop</a>
                            </li>
                            <li>
                                <a href="http://localhost/style-shop-2022/home/blog">Blog</a>
                            </li>

                            <li>
                                <a href="http://localhost/style-shop-2022/home/about">About</a>
                            </li>

                            <li>
                                <a href="http://localhost/style-shop-2022/home/contact">Contact</a>
                            </li>
                        </ul>
                    </div>



                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="search__wrapper">
                            <div class="search__input">
                                <span> <i class="fa-solid fa-magnifying-glass"></i></span>
                                <input type="text" id="search__name">
                            </div>
                            <div class="search__box">
                                <div class="search__box__content">
                                    <div class="search__box__content__title">
                                        <span>Kết quả</span>
                                        <span class="btn-close"><i class="fa-solid fa-xmark"></i></span>
                                    </div>
                                    <div class="search-box-content__list">
                                        <ul id="search__result">


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style=" margin-right: 20px;" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                    if (isset($fullname))
                        echo $fullname;
                    else echo '<i style="font-size: 27px;color:rgb(236, 79, 58)" class="far fa-user"></i>';
                    ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                    if (!isset($fullname)) {
                        echo '<a class="dropdown-item" href="http://localhost/style-shop-2022/Login">Đăng nhập</a>';
                        echo '<a class="dropdown-item" href="http://localhost/style-shop-2022/Register">Đăng ký</a>';
                    } else {
                        if ($user["role_id"] == 2) echo '<a class="dropdown-item" href="http://localhost/style-shop-2022/OrderAdmin">Quản lý trang web</a>';
                        echo '<a class="dropdown-item" href="http://localhost/style-shop-2022/Home/ManageAccount">Quản lý tài khoản</a>';
                        echo '<a class="dropdown-item" href="http://localhost/style-shop-2022/Home/quanlydonhang/' . $user["id"] . '">Quản lý đơn hàng</a>';
                        echo '<a class="dropdown-item" href="http://localhost/style-shop-2022/Login/UserLogout">Đăng xuất</a>';
                    }

                    ?>

                        </div>
                    </div>

                    <!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div> -->

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                        data-notify="<?= $count ?>">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>

            </div>
            </nav>
        </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.html"><img src="http://localhost/style-shop-2022/public/images/icons/logo-01.png"
                        alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">

                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                    data-notify="2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>

                <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
                    data-notify="0">
                    <i class="fa-solid fa-heart"></i>
                </a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile-tin" style="height:0px; display:none">
            <ul class="main-menu-m">
                <li>
                    <a href="http://localhost/style-shop-2022/home">Home</a>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="http://localhost/style-shop-2022/home/shop">Shop</a>
                </li>
                <li>
                    <a href="http://localhost/style-shop-2022/home/blog">Blog</a>
                </li>

                <li>
                    <a href="http://localhost/style-shop-2022/home/about">About</a>
                </li>

                <li>
                    <a href="http://localhost/style-shop-2022/home/comtact">Contact</a>
                </li>
            </ul>
        </div>


    </header>

    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
            <?php
            $total = 0;
            $cart = $data['cart'];
             
            echo '<div class="header-cart-content flex-w js-pscroll">';
            echo   '<ul class="header-cart-wrapitem w-full">';
            for ($i = 0; $i < $cart["countOrder"]; $i++) {
                $total += $cart["num"][$i] * $cart["orderDetails"][$i]["price"];
                echo    '<li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="' . $cart["orderDetails"][$i]["photo"] . '" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            ' . $cart["orderDetails"][$i]["title"] . '
                            </a>

                            <span class="header-cart-item-info">
                                ' . $cart['num'][$i] .' x ' . number_format($cart["orderDetails"][$i]["price"]) . ' VND
                            </span>
                        </div>
                    </li>';

            }

                   
            echo    '</ul>';

            echo    '<div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: ' . number_format($total) . ' VND
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="http://localhost/style-shop-2022/home/cart"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="http://localhost/style-shop-2022/Home/checkout/' . $total . '"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>';

            echo '</div>';
        ?>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/vendor/bootstrap/js/popper.js"></script>
    <script src="http://localhost/style-shop-2022/public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/vendor/select2/select2.min.js"></script>
    <script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
    </script>
    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/vendor/daterangepicker/moment.min.js"></script>
    <script src="http://localhost/style-shop-2022/public/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/vendor/slick/slick.min.js"></script>
    <script src="http://localhost/style-shop-2022/public/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/vendor/parallax100/parallax100.js"></script>
    <script>
    $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    });
    </script>
    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
    $('.js-addwish-b2').on('click', function(e) {
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function() {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function() {
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
        });
    });
    </script>
    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
    $('.js-pscroll').each(function() {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function() {
            ps.update();
        })
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        var action = "search";

        $("#search__name").keyup(function() {
            $(".search__box").show();
            var search_name = $("#search__name").val();
            console.log(search_name);
            if ($("#search__name").val() != '') {
                $.ajax({
                    url: "http://localhost/style-shop-2022/Home/search",
                    method: "POST",
                    data: {
                        action: action,
                        search_name: search_name
                    },
                    success: function(data) {
                        $("#search__result").html(data);
                    }
                });
            } else $("#search__result").html("");
        });
        $(window).click(function() {
            //Hide the menus if visible
            $("#search__result").html("");
        });
    });
    </script>


    <script>
    $(".main-menu").on('click', 'li', function() {

        $(this).addClass("active-menu").siblings().removeClass("active-menu");
    });

    $(".btn-close").on("click", function() {

        $(".search__box").hide();
    })
    $(".btn-show-menu-mobile").on("click", function() {
        $(this).toggleClass("is-active");
        // $(".menu-mobile-tin").slideToggle();

        if ($(".btn-show-menu-mobile").hasClass("is-active")) {
            $(".menu-mobile-tin").css("display", "block");
            $(".menu-mobile-tin").css("height", "100%");
        } else {
            $(".menu-mobile-tin").css("display", "none");
            $(".menu-mobile-tin").css("height", "0%");
        }
    });
    </script>
    <!--===============================================================================================-->
    <script src="http://localhost/style-shop-2022/public/js/main.js"></script>