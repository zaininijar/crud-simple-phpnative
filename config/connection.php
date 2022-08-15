<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_crud";
    $conn = mysqli_connect($host, $user, $pass, $db);

    if(!$conn) {
        echo 'Database Error';
    }

?>
