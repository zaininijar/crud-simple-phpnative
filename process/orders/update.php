<?php

  if (isset($_POST['update_order'])) {
    $nm = $_POST['nama_makanan'];
    $hr = $_POST['harga'];
    $qu = $_POST['quantity'];
    $th = $hr * $qu;

    $message = "";
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

    $result = $conn->query($sql);

    if (mysqli_error($conn) <= 0) {
      echo "
        <script>
          confirm('". $message ."') ?
          window.location.href = '../orders' :
          window.location.href = '../orders';
        </script>
      ";
    }else {
      var_dump(mysqli_error($conn));
      echo "error 500!";
    }

  } else {
    echo "
      <script>
        window.location.href = '../404';
      </script>
    ";
  }

?>
