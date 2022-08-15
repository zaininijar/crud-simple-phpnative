<?php

  if (isset($_POST['submit_order'])) {
    $nm = $_POST['nama_makanan'];
    $hr = $_POST['harga'];
    $qu = $_POST['quantity'];
    $th = $hr * $qu;

    $message = "";
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
