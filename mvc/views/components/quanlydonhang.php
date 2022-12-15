<section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('http://localhost/style-shop-2022/public/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Quản lý đơn hàng
        </h2>
</section>


<section class="bg0 p-t-104 p-b-116">
    <div class="container">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Ngày đặt hàng</th>
      <th scope="col">Tổng số tiền</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Xác nhận</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $countOrderItem = count($data["orderItem"]);
    for ($i = 0; $i < $countOrderItem; $i++) {
      echo '<tr>
        <td>' . ($i + 1) . '</td>
        <td><a href="http://localhost/style-shop-2022/Home/viewOrder/' . $data["orderItem"][$i]["id"] . '">' . $data["orderItem"][$i]["fullname"] . '</a></td>
        <td>' . $data["orderItem"][$i]["phone"] . '</td>
        <td>' . $data["orderItem"][$i]["created_at"] . '</td>
        <td>' . number_format($data["orderItem"][$i]["total_money"]) . ' đ</td>
        <td>';
      if ($data["orderItem"][$i]["status"] == 0)
        echo 'Chờ duyệt';
      else if ($data["orderItem"][$i]["status"] == 1) echo "Đang giao hàng";
      else if ($data["orderItem"][$i]["status"] == 2) echo "Đã huỷ";
      else echo "Giao dịch hoàn tất!";
      echo '</td>';
      if ($data["orderItem"][$i]["status"] == 1)
        echo '<td><a href="http://localhost/style-shop-2022/Home/confirmOrder/' . $data["orderItem"][$i]["id"] . '/' . $user["id"] . '"><button class="btn btn-danger">Đã nhận hàng</button><a/></td>
        </tr>';
    }
    ?>
  </tbody>
</table>
  </div>
  </section>