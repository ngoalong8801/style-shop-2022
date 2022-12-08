<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Shoping Cart
        </span>
    </div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>



                            <?php
                            $total = 0;
                            for ($i = 0; $i < $data["countOrder"]; $i++) {
                                $total += $data["num"][$i] * $data["orderDetails"][$i]["price"];
                                echo '<tr class="table_row">
                            <td class="column-1">
                                <div class="how-itemcart1">
                                    <img src="' . $data["orderDetails"][$i]["photo"] . '">
                                </div>
                            </td>
                            <td class="column-2">' . $data["orderDetails"][$i]["title"] . '</td>
                            <td class="product-price column-3"> <span class"price"> ' . number_format($data["orderDetails"][$i]["price"]) . ' </span> VND</td>
                            <td class="column-4">
                                <div id="' .  $data["orderDetails"][$i]["id"] . '" class="wrap-num-product flex-w m-l-auto m-r-0">
                                    <button type="button" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </button>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                        name="num-product1" value="' . $data["num"][$i] . '">

                                    <div type="button" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="total-price-product column-5"> <span>' . number_format($data["num"][$i] * $data["orderDetails"][$i]["price"]) . ' </span> VND</td>
                        </tr>';
                            }
                            ?>
                        </table>
                    </div>


                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span id="sub-total" class="mtext-110 cl2">
                                <?= number_format($total) ?> 
                            </span>
                            VND
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Shipping:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                Free Ship
                            </p>


                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span id="total-bill" class="mtext-110 cl2">
                                <?= number_format($total) ?> 
                            </span>
                            VND
                        </div>
                    </div>

                    <button id="checkout" type="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#checkout").click(function(){
            let total = Number($("#total-bill").text().replaceAll(',',''));

            window.location.href = 'http://localhost/style-shop-2022/Home/checkout/' + total;
        }); 

        $(".btn-num-product-down").click(function() {
            let id = $(this).parent().attr('id')
            let numAttr = $(this).parent().children(".num-product")
            let totalAttr = $(this).parent().parent().parent().children(".total-price-product").find("span")
            let priceAttr = $(this).parent().parent().parent().children(".product-price").find("span")

            let subtotal = $("#sub-total")
            let totalBill = $("#total-bill")

            numAttr.val(Number(numAttr.val()) - 1);
            totalAttr.text(new Intl.NumberFormat().format(Number(priceAttr.text().replace(',', '')) * Number(numAttr.val())))
            let amount = Number(subtotal.text().replaceAll(',',''))
            let updateAmount = amount  -  Number(priceAttr.text().replaceAll(',', ''))

            subtotal.text(new Intl.NumberFormat().format(updateAmount))
            totalBill.text(new Intl.NumberFormat().format(updateAmount))
            $.ajax({
                url: "../home/updateCart",
                method: "POST",
                data: {
                    action: "MINUS",
                    productId: id
                },
                success: function(data) {
                   
                }
            });

            if(Number(numAttr.val()) == 0){
            $.ajax({
                url: "../Home/deleteCart",
                method: "POST",
                data: {
                    action: "DELETE",
                    productId: id,
            },
            success: function(data) {
            location.reload();
            }
    });
        }

            // header("Refresh:0; url=../../blocks/header.php");
        });

        $(".btn-num-product-up").click(function() {
            let id = $(this).parent().attr('id')
            let numAttr = $(this).parent().children(".num-product")
            let totalAttr = $(this).parent().parent().parent().children(".total-price-product").find("span")
            let priceAttr = $(this).parent().parent().parent().children(".product-price").find("span")

            let subtotal = $("#sub-total")
            let totalBill = $("#total-bill")

            numAttr.val(Number(numAttr.val()) + 1);
            totalAttr.text(new Intl.NumberFormat().format(Number(priceAttr.text().replace(',', '')) * Number(numAttr.val())))

            // console.log(subtotal.text().replaceAll(',',''))
            let amount = Number(subtotal.text().replaceAll(',',''))
            let updateAmount = amount  +  Number(priceAttr.text().replaceAll(',', ''))

            subtotal.text(new Intl.NumberFormat().format(updateAmount))
            totalBill.text(new Intl.NumberFormat().format(updateAmount))

            $.ajax({
                url: "../home/updateCart",
                method: "POST",
                data: {
                    action: "PLUS",
                    productId: id
                },
                success: function(data) {
                   
                }
            });



            // header("Refresh:0; url=../../blocks/header.php");
        });
    });
</script>