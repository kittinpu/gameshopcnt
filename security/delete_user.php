<?php

    require "../connection/connectdb.php";

    $user_id = $_GET['id'];

    $sql_delete = "DELETE FROM user WHERE user_id='$user_id'";
    $result_delete = mysqli_query($dbcon, $sql_delete);

    if ($result_delete) {
        header("Location: read_user");
    } else {
        echo "เกิดข้อผิดพลาด ".mysqli_error($dbcon);
    }

    mysqli_close($dbcon);

?>