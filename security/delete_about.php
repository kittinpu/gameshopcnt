<?php

    require "../connection/connectdb.php";

    $about_id = $_GET['id'];

    $sql_select = "SELECT about_filename FROM about WHERE about_id='$about_id'";
    $res_select = mysqli_query($dbcon, $sql_select);
    $about_filename = mysqli_fetch_row($res_select);
    $filename = $about_filename[0];

    unlink('../aboutimg/'.$filename);

    $sql_delete = "DELETE FROM about WHERE about_id='$about_id'";
    $result_delete = mysqli_query($dbcon, $sql_delete);

    if ($result_delete) {
        header("Location: read_about");
    } else {
        echo "เกิดข้อผิดพลาด ".mysqli_error($dbcon);
    }

    mysqli_close($dbcon);

?>