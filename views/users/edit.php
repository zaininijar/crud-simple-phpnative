<?php

  if (isset($id)) {

      $id = $id;
      $sql = "SELECT * FROM orders WHERE id = $id";
      $result = $conn->query($sql);
      $order = '';

      if($result->num_rows > 0) {
        $order = $result->fetch_assoc();
      }else {
        echo "Order tidak di temukan";
      }

  }

?>

<div class="border px-3 pt-3 mb-3">
    <p class="fs-4">Form Edit Order</p>
</div>
<div class="card">
  <div class="card-body">
    <form action="<?= $APP_URL . 'orders/update' ?>" method="post">
        <div>
            <label for="nama_makanan">Nama Makanan : </label>
            <div class="input-group mb-3">
              <input type="text" value="<?= $order['nama_makanan'] ?>" name="nama_makanan" id="nama_makanan" class="form-control" placeholder="Type name your food">
              <input type="hidden" value="<?= $order['id'] ?>" name="id" id="id">
            </div>
        </div>
        <div>
            <label for="harga">Harga : </label>
            <div class="input-group mb-3">
              <input type="number" value="<?= $order['harga'] ?>" name="harga" id="harga" class="form-control" placeholder="Input price">
            </div>
        </div>
        <div>
            <label for="quantity">Quantity : </label>
            <div class="input-group mb-3">
              <input type="number" value="<?= $order['quantity'] ?>" name="quantity" id="quantity" class="form-control" placeholder="Input quantity">
            </div>
        </div>
        <button type="submit" name="update_order" class="btn btn-primary">Update Order</button>
    </form>
  </div>
</div>
