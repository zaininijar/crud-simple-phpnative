<?php

  require_once "connection.php";

  $user = array(['username' => '', 'password' => '']);

  if (isset($_GET['users']) && isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $user = [];
    if($result->num_rows > 0) {
      $user = $result->fetch_assoc();
    }else {
      echo "User tidak di temukan";
    }

  }elseif (!isset($_GET['users']) && isset($_GET['id'])) {
    $id = $_GET['id'];
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <?php if(isset($_GET['users'])): ?>
      <h1>Form Input User</h1>
      <form action="process.php" method="post">
          <div>
              <label for="username">Username : </label>
              <input type="text" value="<?= $user['username'] ?>" name="username" id="username">
              <input type="hidden" value="<?= $user['id'] ?>" name="id" id="id">
          </div>
          <div>
              <label for="password">Password : </label>
              <input type="text" value="<?= $user['password'] ?>" name="password" id="password">
          </div>
          <button type="submit" name="submit_user">Simpan</button>
      </form>
    <?php else: ?>
      <h1>Form Order</h1>
      <form action="process.php" method="post">
          <div>
              <label for="nama_makanan">Nama Makanan : </label>
              <input type="text" value="<?= $order['nama_makanan'] ?>" name="nama_makanan" id="nama_makanan">
              <input type="hidden" value="<?= $order['id'] ?>" name="id" id="id">
          </div>
          <div>
              <label for="harga">Harga : </label>
              <input type="number" value="<?= $order['harga'] ?>" name="harga" id="harga">
          </div>
          <div>
              <label for="quantity">Quantity : </label>
              <input type="number" value="<?= $order['quantity'] ?>" name="quantity" id="quantity">
          </div>
          <button type="submit" name="submit_order">Simpan</button>
      </form>
    <?php endif; ?>
</body>
</html>
