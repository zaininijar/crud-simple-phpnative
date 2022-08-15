<?php

  $sql = "SELECT * FROM orders";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $orders = [];
    while($row = $result->fetch_assoc()){
   		array_push($orders, $row);
   	}
  }else {
    var_dump(mysqli_error($conn));
  }

?>


<div class="row">
    <a style="width: auto;" class="btn btn-outline-primary mb-4" href="<?= $APP_URL .'orders/create' ?>">Tambah Order</a>
    <div class="card px-0 py-3">
      <p class="fs-4 ms-3">List Order</p>
      <div class="card-body">
        <table id="orders-table" class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Makanan</th>
              <th>Harga</th>
              <th>Quantity</th>
              <th>Total Harga</th>
              <th>Act</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $no => $order): ?>
            <tr>
              <td><?= $no + 1 ?></td>
              <td><?= $order['nama_makanan'] ?></td>
              <td><?= $order['harga'] ?></td>
              <td><?= $order['quantity'] ?></td>
              <td><?= $order['total_harga'] ?></td>
              <td>
                <a href="<?= $APP_URL . 'orders/edit?id=' . $order['id'] ?>">&ee;dit</a>
                <a href="<?= $APP_URL . 'orders/delete?id=' . $order['id'] ?>">&dd;elete</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
  </div>
</div>
<script>
  $(document).ready( function () {
     $('#orders-table').DataTable();
  });
</script>
