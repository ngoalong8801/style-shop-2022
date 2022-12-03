<div id="wrapper">

    <a style="color:black;text-decoration:none" href="http://localhost/style-shop-2022/Home/productList/1">
        <h3 style="margin-left:20px; margin-top: 15px">Ao</h3>
    </a>
    <hr />
    <div class="container container-fluid py-4">
        <div class="m-auto">
            <div class="owl-carousel owl-theme">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    echo '<div class="item p-2">';
                    echo    '<div class="card">';
                    echo        '<a href="http://localhost/style-shop-2022/Home/productDetail/' . $data["shirtProduct"][$i]["id"] . '">
                            <img class="card-img-top "
                                src="' . $data["shirtProduct"][$i]["photo"] . '"
                                alt="Card image cap">
                        </a>';
                    echo        '<div class="card-body">';
                    echo            '<a id="taga" href="http://localhost/style-shop-2022/Home/productDetail/' . $data["shirtProduct"][$i]["id"] . '"><h5 class="card-title">' . $data["shirtProduct"][$i]["title"] . '</h5></a>
                            <hr />';
                    echo            '<span class="card-text">' . number_format($data["shirtProduct"][$i]["discount"]) . 'đ</span>';
                    echo            '<span style="margin-left:12px; text-decoration: line-through;" class="card-text">';
                    if ($data["shirtProduct"][$i]["discount"] != 0) echo number_format($data["shirtProduct"][$i]["price"]) . 'đ';
                    echo '</span>';
                    echo        '</div>';
                    echo        '<button type="button" class="btnOrder btn btn-warning" onclick="addToCard(' . $data["shirtProduct"][$i]["id"] . ')">Đặt hàng</button>';
                    echo    '</div></div>';
                }
                ?>
            </div>
        </div>
    </div>
    
    <a style="color:black;text-decoration:none" href="http://localhost/style-shop-2022/Home/productList/1">
        <h3 style="margin-left:20px; margin-top: 15px">Quan</h3>
    </a>
    <hr />
    <div class="container container-fluid py-4">
        <div class="m-auto">
            <div class="owl-carousel owl-theme">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    echo '<div class="item p-2">';
                    echo    '<div class="card">';
                    echo        '<a href="http://localhost/style-shop-2022/Home/productDetail/' . $data["pantProduct"][$i]["id"] . '">
                            <img class="card-img-top "
                                src="' . $data["pantProduct"][$i]["photo"] . '"
                                alt="Card image cap">
                        </a>';
                    echo        '<div class="card-body">';
                    echo            '<a id="taga" href="http://localhost/SPhone/Home/productDetail/' . $data["pantProduct"][$i]["id"] . '"><h5 class="card-title">' . $data["pantProduct"][$i]["title"] . '</h5></a>
                            <hr />';
                    echo            '<span class="card-text">' . number_format($data["pantProduct"][$i]["discount"]) . 'đ</span>';
                    echo            '<span style="margin-left:12px; text-decoration: line-through;" class="card-text">';
                    if ($data["pantProduct"][$i]["discount"] != 0) echo number_format($data["pantProduct"][$i]["price"]) . 'đ';
                    echo '</span>';
                    echo        '</div>';
                    echo        '<button type="button" class="btnOrder btn btn-warning" onclick="addToCard(' . $data["pantProduct"][$i]["id"] . ')">Đặt hàng</button>';
                    echo    '</div></div>';
                }
                ?>
            </div>
        </div>
    </div>

    <a style="color:black;text-decoration:none" href="http://localhost/style-shop-2022/Home/productList/1">
        <h3 style="margin-left:20px; margin-top: 15px">Giay</h3>
    </a>
    <hr />
    <div class="container container-fluid py-4">
        <div class="m-auto">
            <div class="owl-carousel owl-theme">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    echo '<div class="item p-2">';
                    echo    '<div class="card">';
                    echo        '<a href="http://localhost/style-shop-2022/Home/productDetail/' . $data["sandalProduct"][$i]["id"] . '">
                            <img class="card-img-top "
                                src="' . $data["sandalProduct"][$i]["photo"] . '"
                                alt="Card image cap">
                        </a>';
                    echo        '<div class="card-body">';
                    echo            '<a id="taga" href="http://localhost/SPhone/Home/productDetail/' . $data["sandalProduct"][$i]["id"] . '"><h5 class="card-title">' . $data["sandalProduct"][$i]["title"] . '</h5></a>
                            <hr />';
                    echo            '<span class="card-text">' . number_format($data["sandalProduct"][$i]["discount"]) . 'đ</span>';
                    echo            '<span style="margin-left:12px; text-decoration: line-through;" class="card-text">';
                    if ($data["sandalProduct"][$i]["discount"] != 0) echo number_format($data["sandalProduct"][$i]["price"]) . 'đ';
                    echo '</span>';
                    echo        '</div>';
                    echo        '<button type="button" class="btnOrder btn btn-warning" onclick="addToCard(' . $data["sandalProduct"][$i]["id"] . ')">Đặt hàng</button>';
                    echo    '</div></div>';
                }
                ?>
            </div>
        </div>
    </div>


    <a style="color:black;text-decoration:none" href="http://localhost/style-shop-2022/Home/productList/1">
        <h3 style="margin-left:20px; margin-top: 15px">Non</h3>
    </a>
    <hr />
    <div class="container container-fluid py-4">
        <div class="m-auto">
            <div class="owl-carousel owl-theme">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    echo '<div class="item p-2">';
                    echo    '<div class="card">';
                    echo        '<a href="http://localhost/style-shop-2022/Home/productDetail/' . $data["hatProduct"][$i]["id"] . '">
                            <img class="card-img-top "
                                src="' . $data["hatProduct"][$i]["photo"] . '"
                                alt="Card image cap">
                        </a>';
                    echo        '<div class="card-body">';
                    echo            '<a id="taga" href="http://localhost/SPhone/Home/productDetail/' . $data["hatProduct"][$i]["id"] . '"><h5 class="card-title">' . $data["hatProduct"][$i]["title"] . '</h5></a>
                            <hr />';
                    echo            '<span class="card-text">' . number_format($data["hatProduct"][$i]["discount"]) . 'đ</span>';
                    echo            '<span style="margin-left:12px; text-decoration: line-through;" class="card-text">';
                    if ($data["hatProduct"][$i]["discount"] != 0) echo number_format($data["hatProduct"][$i]["price"]) . 'đ';
                    echo '</span>';
                    echo        '</div>';
                    echo        '<button type="button" class="btnOrder btn btn-warning" onclick="addToCard(' . $data["hatProduct"][$i]["id"] . ')">Đặt hàng</button>';
                    echo    '</div></div>';
                }
                ?>
            </div>
        </div>
    </div>

    <a style="color:black;text-decoration:none" href="http://localhost/style-shop-2022/Home/productList/1">
        <h3 style="margin-left:20px; margin-top: 15px">Mat Kinh</h3>
    </a>
    <hr />
    <div class="container container-fluid py-4">
        <div class="m-auto">
            <div class="owl-carousel owl-theme">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    echo '<div class="item p-2">';
                    echo    '<div class="card">';
                    echo        '<a href="http://localhost/style-shop-2022/Home/productDetail/' . $data["glassProduct"][$i]["id"] . '">
                            <img class="card-img-top "
                                src="' . $data["glassProduct"][$i]["photo"] . '"
                                alt="Card image cap">
                        </a>';
                    echo        '<div class="card-body">';
                    echo            '<a id="taga" href="http://localhost/SPhone/Home/productDetail/' . $data["glassProduct"][$i]["id"] . '"><h5 class="card-title">' . $data["glassProduct"][$i]["title"] . '</h5></a>
                            <hr />';
                    echo            '<span class="card-text">' . number_format($data["glassProduct"][$i]["discount"]) . 'đ</span>';
                    echo            '<span style="margin-left:12px; text-decoration: line-through;" class="card-text">';
                    if ($data["glassProduct"][$i]["discount"] != 0) echo number_format($data["glassProduct"][$i]["price"]) . 'đ';
                    echo '</span>';
                    echo        '</div>';
                    echo        '<button type="button" class="btnOrder btn btn-warning" onclick="addToCard(' . $data["glassProduct"][$i]["id"] . ')">Đặt hàng</button>';
                    echo    '</div></div>';
                }
                ?>
            </div>
        </div>
    </div>

    <a style="color:black;text-decoration:none" href="http://localhost/style-shop-2022/Home/productList/1">
        <h3 style="margin-left:20px; margin-top: 15px">Phu kien khac</h3>
    </a>
    <hr />
    <div class="container container-fluid py-4">
        <div class="m-auto">
            <div class="owl-carousel owl-theme">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    echo '<div class="item p-2">';
                    echo    '<div class="card">';
                    echo        '<a href="http://localhost/style-shop-2022/Home/productDetail/' . $data["otherProduct"][$i]["id"] . '">
                            <img class="card-img-top "
                                src="' . $data["otherProduct"][$i]["photo"] . '"
                                alt="Card image cap">
                        </a>';
                    echo        '<div class="card-body">';
                    echo            '<a id="taga" href="http://localhost/SPhone/Home/productDetail/' . $data["otherProduct"][$i]["id"] . '"><h5 class="card-title">' . $data["otherProduct"][$i]["title"] . '</h5></a>
                            <hr />';
                    echo            '<span class="card-text">' . number_format($data["otherProduct"][$i]["discount"]) . 'đ</span>';
                    echo            '<span style="margin-left:12px; text-decoration: line-through;" class="card-text">';
                    if ($data["otherProduct"][$i]["discount"] != 0) echo number_format($data["otherProduct"][$i]["price"]) . 'đ';
                    echo '</span>';
                    echo        '</div>';
                    echo        '<button type="button" class="btnOrder btn btn-warning" onclick="addToCard(' . $data["otherProduct"][$i]["id"] . ')">Đặt hàng</button>';
                    echo    '</div></div>';
                }
                ?>
            </div>
        </div>
    </div>





</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        responsive: {
            0: {
                items: 1
            },
            550: {
                items: 2
            },
            900: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    })
    $(document).ready(function() {
        $(".btnOrder").click(function() {
            $("#alertSuccess").html('<p style="background-color: #55e073;padding: 10px;"><i class="fas fa-check-circle"></i>Thêm vào giỏ hàng thành công</p>');
        });
    });

    function addToCard(productId) {
        var action = "add";
        $.ajax({
            url: "home/addToCart",
            method: "POST",
            data: {
                action: action,
                productId: productId,
                num: 1
            },
            success: function(data) {
                location.reload();
            }
        });
    }
</script>