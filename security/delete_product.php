<?php

    require "../connection/connectdb.php";

    $product_id = $_GET['id'];

    $sql_select = "SELECT product_filename FROM product WHERE product_id='$product_id'";
    $res_select = mysqli_query($dbcon, $sql_select);
    $product_filename = mysqli_fetch_row($res_select);
    $filename = $product_filename[0];

    unlink('../gameimg/'.$filename);

    $sql_delete = "DELETE FROM product WHERE product_id='$product_id'";
    $result_delete = mysqli_query($dbcon, $sql_delete);

    if ($result_delete) {
        header("Location: read_product");
    } else {
        echo "เกิดข้อผิดพลาด ".mysqli_error($dbcon);
    }

    mysqli_close($dbcon);

?>