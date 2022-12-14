<?php
$user = getUserSession(0); 
?>
<section class="bg-img1 txt-center p-lr-15 p-tb-92"
    style="background-image: url('http://localhost/style-shop-2022/public/images/bg-02.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
	Quản lý tài khoản
    </h2>
</section>
<section class="bg0 p-t-104 p-b-116">
    <div class="container bg-dark">
		<div class="row" style="margin: 70px auto 0;width:50%">
			<div class="col-md-12 table-responsive">
				<img src="<?= $user["avatar"] ?>" class="img-thumbnail" style="width: 10rem; height: 10rem;" alt="User avatar">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h5 style="color: red;"></h5>
					</div>
					<div class="panel-body">
						<form method="post" action="http://localhost/style-shop-2022/UserAdmin/PostEdit/">
							<div class="form-group">
								<label for="usr">Họ & Tên:</label>
								<input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?= $user["fullname"] ?>">
								<input type="text" name="id" value="<?= $user["id"] ?>" hidden="true">
								<input type="text" name="updateInfoUser" value="1" hidden="true">
								<input type="text" name="role_id" value="<?= $user["role_id"] ?>" hidden="true">
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input required="true" type="email" class="form-control" id="email" name="email" value="<?= $user["email"] ?>">
							</div>
							<div class="form-group">
								<label for="phone">SĐT:</label>
								<input required="true" type="tel" class="form-control" id="phone" name="phone" value="<?= $user["phone"] ?>">
							</div>
							<div class="form-group">
								<label for="address">Địa Chỉ:</label>
								<input required="true" type="text" class="form-control" id="address" name="address" value="<?= $user["address"] ?>">
							</div>
							<div class="form-group">
								<label for="avatar">URL Ảnh đại diện:</label>
								<input required="true" type="text" class="form-control" id="avatar" name="avatar" value="<?= $user["avatar"] ?>">
							</div>
							<div class="form-group">
								<label for="pwd">Mật Khẩu:</label>
								<input type="password" class="form-control" id="pwd" name="password" minlength="6">
							</div>
							<button class="btn btn-success" style="width: 100px; margin-top: 10px; margin-bottom: 10px;">Lưu</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>