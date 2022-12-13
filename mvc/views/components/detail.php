<section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('http://localhost/style-shop-2022/public/images/bg-02.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Chi tiết đơn hàng
        </h2>
</section>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Tổng số tiền</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $countDetail = count($data["detailOrder"]);
    for ($i = 0; $i < $countDetail; $i++) {
      echo '<tr>
        <td>' . ($i + 1) . '</td>
        <td><img src="' . fixUrl($data["detailOrder"][$i]['photo']) . '" style="height: 120px"/></td>
        <td>' . $data["detailOrder"][$i]['title'] . '</td>
        <td>' . number_format($data["detailOrder"][$i]['price']) . ' đ</td>
        <td>' . $data["detailOrder"][$i]['num'] . '</td>
        <td>' . number_format($data["detailOrder"][$i]['total_money']) . ' đ</td>
      </tr>';
    }
    ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><strong>Tổng số tiền:</strong></td>
      <td><strong><?= number_format($data["orderItem"]["total_money"]) ?> đ</strong></td>
    </tr>
  </tbody>
</table>