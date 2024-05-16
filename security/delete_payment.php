<?php

    require "../connection/connectdb.php";

    $payment_id = $_GET['id'];

    $sql_select = "SELECT payment_filename FROM payment WHERE payment_id='$payment_id'";
    $res_select = mysqli_query($dbcon, $sql_select);
    $paymentimg_filename = mysqli_fetch_row($res_select);
    $filename = $paymentimg_filename[0];

    unlink('../payimg/'.$filename);

    $sql_delete = "DELETE FROM payment WHERE payment_id='$payment_id'";
    $result_delete = mysqli_query($dbcon, $sql_delete);

    if ($result_delete) {
        header("Location: read_payment");
    } else {
        echo "เกิดข้อผิดพลาด ".mysqli_error($dbcon);
    }

    mysqli_close($dbcon);

?>