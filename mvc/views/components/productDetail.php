<?php $countFeedback = count($data["feedbackProduct"]); ?>
<div class="hero-wrap hero-bread"
    style="background-image: url('http://localhost/style-shop-2022/public/images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a
                            href="http://localhost/style-shop-2022/home">Home</a></span> <span>Shop</span></p>
                <h1 class="mb-0 bread">Shop</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="<?php echo $data["productItem"]['photo']; ?>"
                    class="image-popup prod-img-bg"><img
                        src="<?php echo $data["productItem"]['photo']; ?>" class="img-fluid"
                        alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?php echo $data["productItem"]['title']; ?></h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                    </p>
                </div>
                <?php
                //  echo $data["productItem"]['price'];
                ?>
               
                <p class="price"><span><?php echo $data["productItem"]['price']; ?> VND</span></p>
                <p><?php echo $data["productItem"]['description']; ?></p>
           
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group d-flex">
                            <div class="select-wrap">
                                <div class="icon"><span class="fa-solid fa-chevron-down"></span></div>
                                <select name="" id="" class="form-control">
                                    <option value="">Small</option>
                                    <option value="">Medium</option>
                                    <option value="">Large</option>
                                    <option value="">Extra Large</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="quantity form-control input-number"
                            value="1" min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" onclick="" class="quantity-right-plus btn" data-type="plus" data-field="">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <p style="color: #000;">80 piece available</p>
                    </div>
                </div>
                <p><a href='javascript:;' onclick="addToCard(<?= $data['productItem']['id'] ?>)" class="btn btn-black py-3 px-5 mr-2">Add to Cart</a>
            </div>
        </div>




        <div class="row mt-5">
            <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill"
                        href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>
                    <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab"
                        aria-controls="v-pills-3" aria-selected="false">Reviews</a>

                </div>
            </div>
            <div class="col-md-12 tab-wrap">

                <div class="tab-content bg-light" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                        <div class="p-4">
                            <h3 class="mb-4"><?php echo $data["productItem"]['title']; ?></h3>
                            <p><?php echo $data["productItem"]['description']; ?></p>
                        </div>
                    </div>

    
                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                        <div class="row p-4">
                            <div class="col-md-7">
                                <h3 class="mb-4"><?= $countFeedback ?> Reviews</h3>
                                <?php
                                for ($i = 0; $i < $countFeedback; $i++) {
                                    echo ' <div class="review">
                                    <div class="user-img" style="" src="' . $data["feedbackProduct"][$i]["avatar"] . '"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">' . $data["feedbackProduct"][$i]["fullname"] . '</span>
                                            <span class="text-right">' . $data["feedbackProduct"][$i]["updated_at"] . '</span>
                                        </h4>
                                
                                        <p>' . $data["feedbackProduct"][$i]["note"] . '</p>
                                    </div>
                                </div>';
                                }
                                ?>
                                <div class="review">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">Jacob Webb</span>
                                            <span class="text-right">14 March 2018</span>
                                        </h4>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                            </span>
                                            <span class="text-right"><a href="#" class="reply"><i
                                                        class="icon-reply"></i></a></span>
                                        </p>
                                        <p>When she reached the first hills of the Italic Mountains, she had a last view
                                            back on the skyline of her hometown Bookmarksgrov</p>
                                    </div>
                                </div>
                               
                            </div>
                            
                        </div>
                        <h5 class="mt-4">Thêm bài đánh giá</h5>
        <form form method="post" enctype="multipart/form-data" action="http://localhost/style-shop-2022/Feedback/addFeedback">
          <!-- Your review -->
          <input type="text" name="product_id" value="<?= $data["productItem"]["id"] ?>" hidden="true">
          <input type="text" name="user_id" value="<?= $user["id"] ?>" hidden="true">
          <div class="md-form md-outline">
            <label for="form76">Nội dung</label>
            <textarea name="note" id="form76" class="md-textarea form-control pr-6" rows="4"></textarea>
          </div>
          <div class="text-right pb-2">
            <button class="btn btn-primary" name="btnReview" onclick="checkContentFeedback()">Thêm bài đánh giá</button>
          </div>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
  function checkContentFeedback() {
    var note = document.getElementById("form76").value;
    var userId = document.getElementById("user_id").innerHTML;
    if (userId == '123')
      alert("Vui lòng đăng ngập để đánh giá!!!");
    else if (note == "")
      alert("Vui lòng nhập nội dung đánh giá!!!");
  }

  $(document).ready(function() {
    $(".btnOrder").click(function() {
      $("#alertSuccess").html('<p style="background-color: #55e073;padding: 10px;"><i class="fas fa-check-circle"></i>Thêm vào giỏ hàng thành công</p>');
    });
    $(".btn").click(function() {
      $("#alertSuccess").html('<p style="background-color: #55e073;padding: 10px;"><i class="fas fa-check-circle"></i>Thêm vào giỏ hàng thành công</p>');
    });

    $(".quantity-left-minus").click(function(){
        let quantity = Number($("#quantity").val()) - 1
        $("#quantity").val(quantity);
        
    });

    $(".quantity-right-plus").click(function(){
        $("#quantity").val(Number($("#quantity").val()) + 1);
    });
  });

  function addToCard(productId) {
    let num = document.getElementById("quantity").value;
    let action = "add";

    $.ajax({
      url: "../../home/addToCart",
      method: "POST",
      data: {
        action: action,
        productId: productId,
        num: num
      },
      success: function(data) {
        location.reload();
      }
    });
  }
</script>