<?php

    require_once 'connection.php';

    if(isset($_POST)){

      if(isset($_POST['submit_user'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $message = "";

        if ($_POST['id'] !== "") {
          $id = $_POST['id'];
          $sql = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id";
          $message = "success update user";
        }else {
          $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
          $message = "success input user";
        }

        $result = $conn->query($sql);

        if (mysqli_error($conn) <= 0) {
          echo "
          	<script>
              confirm('". $message ."') ?
              window.location.href = 'index.php' :
              window.location.href = 'process.php';
            </script>
          ";
        }else {
          var_dump(mysqli_error($conn));
          echo "error 500!";
        }
      }

      if (isset($_POST['submit_order'])) {
        $nm = $_POST['nama_makanan'];
        $hr = $_POST['harga'];
        $qu = $_POST['quantity'];
        $th = $hr * $qu;

        $message = "";

        if ($_POST['id'] !== "") {
          $id = $_POST['id'];
          $sql = "UPDATE orders
                  SET
                  	nama_makanan = '$nm',
                    harga = '$hr',
                    quantity = '$qu',
                    total_harga = '$th'
                  WHERE
                  	id = $id";
          $message = "success update order";
        }else {
          $sql = "INSERT INTO orders (
                    nama_makanan,
                    harga,
                    quantity,
                    total_harga
                  ) VALUES (
                  	'$nm',
                    '$hr',
                    '$qu',
                    '$th'
                  )";
          $message = "success input order";
        }

        $result = $conn->query($sql);

        if (mysqli_error($conn) <= 0) {
          echo "
          	<script>
              confirm('". $message ."') ?
              window.location.href = 'index.php' :
              window.location.href = 'process.php';
            </script>
          ";
        }else {
          var_dump(mysqli_error($conn));
          echo "error 500!";
        }

      }

    }else {
      echo "404";
    }

    if(isset($_GET)){
      if(isset($_GET['hapus_order']) && isset($_GET['id'])) {

        $id = $_GET['id'];
        $sql = "DELETE FROM orders WHERE id = $id";
        $result = $conn->query($sql);

        if(mysqli_error($conn) <= 0) {
          echo "
          	<script>
              confirm('success delete order') ?
              window.location.href = 'index.php' :
              window.location.href = 'process.php';
            </script>
          ";
        }else {
          var_dump(mysqli_error($conn));
          echo "error 500!";
        }

      }elseif(isset($_GET['logout'])){
        session_start();
        session_destroy();

        header("Location: login.php");
      }elseif(isset($_GET['hapus_user']) && isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id = $id";
        $result = $conn->query($sql);

        if(mysqli_error($conn) <= 0) {
          echo "
          	<script>
              confirm('success delete user') ?
              window.location.href = 'index.php' :
              window.location.href = 'process.php';
            </script>
          ";
        }else {
          var_dump(mysqli_error($conn));
          echo "error 500!";
        }
      }
    }else {
      echo "404";
    }

?>
