<?php

    require "../connection/connectdb.php";

    $typeproduct_id = $_GET['id'];

    $sql_delete = "DELETE FROM typeproduct WHERE typeproduct_id='$typeproduct_id'";
    $result_delete = mysqli_query($dbcon, $sql_delete);

    if ($result_delete) {
        header("Location: read_type");
    } else {
        echo "เกิดข้อผิดพลาด ".mysqli_error($dbcon);
    }

    mysqli_close($dbcon);

?>