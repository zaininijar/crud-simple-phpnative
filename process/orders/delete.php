<?php

  if(isset($id)) {

    $id = $id;
    $sql = "DELETE FROM orders WHERE id = $id";
    $result = $conn->query($sql);

    if(mysqli_error($conn) <= 0) {
      echo "
        <script>
          confirm('success delete order') ?
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
