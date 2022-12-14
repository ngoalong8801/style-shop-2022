<?php
$title = 'Product';
$activeNav = "Product";
require_once('mvc/views/blocks/header_admin.php');
?>

<!-- ===========Main Content============ -->
<div class="container-fluid px-4">
	<h3 class="fs-4 mb-3">Product Management</h3>
	<p class="d-none" id="sqlerror"><?= $data["sqlerror"] ?></p>
	<a href="http://localhost/style-shop-2022/ProductAdmin/Add" class="btn btn-outline-primary">Add New Product</a>
	<div class="row mt-3">

		<div class="col">
			<table id="productList" class="table bg-white rounded shadow-sm table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th class="imgCol">Image</th>
						<th>Category</th>
						<th>Name</th>
						<th>Base Price</th>
						<th>Final Price</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($data["allProduct"] as $item) { ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td class="imgCol"><img src="<?php echo $item['photo']; ?>" alt=""></td>
							<td><?php echo $item['category_name']; ?></td>
							<td><?php echo $item['title']; ?></td>
							<td><?php echo $item['price']; ?></td>
							<td><?php echo $item['discount']; ?></td>
							<td><a href="<?php echo 'http://localhost/style-shop-2022/ProductAdmin/ViewEdit/' . $item['id']; ?>" class="editLink">Edit</a></td>
							<td><a class="delLink" href="<?php echo 'http://localhost/style-shop-2022/ProductAdmin/Delete/' . $item['id']; ?>" style="color: #ff7782;">Delete</a></td>
						</tr>
					<?php $i = $i + 1;
					} ?>

				</tbody>
			</table>
		</div>
	</div>

</div>
<!-- ===========Main Content============ -->
</div>
</div>
<!-- ===========Page Content============ -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function() {
		$('#phoneList').DataTable();
	});
	jQuery(".delLink").on("click", function(e) {
		e.preventDefault();
		var clicked = jQuery(this);
		var clicked_url = clicked.attr("href");

		var msg = confirm("Bạn có chắc chắn rằng muốn xoá sản phẩm này?");
		if (msg == true) {
			window.location.href = clicked_url;
		}
	});
</script>
<script type="text/javascript">
	if (sqlerror.innerHTML == 1) {
		alert("Xóa thất bại!!! Vui lòng kiểm tra lại các đơn hàng!!!")
	}
</script>

<?php
require_once('mvc/views/blocks/footer_admin.php');
?>
