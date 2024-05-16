<?php

    include "../connection/connectdb.php";

    $user_id = $_POST['user_id'];
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_telephone = $_POST['user_telephone'];
    $user_address = $_POST['user_address'];
    $user_status = $_POST['user_status'];
    
    $sql_user = "UPDATE user SET user_username='$user_username',user_email='$user_email',user_telephone='$user_telephone',user_address='$user_address',user_status='$user_status',user_date=NOW()  WHERE user_id='$user_id'";

    $result_user = mysqli_query($dbcon, $sql_user);
    if ($result_user) {
        //echo "บันทึกข้อมูลเรียบร้อย";
        header("Location: read_user");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
 
?>