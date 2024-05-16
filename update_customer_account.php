<?php
    require 'session_customer.php';
    include "connection/connectdb.php";

    $user_id = $_POST['user_id'];
    $s_user_username = $_POST['user_username'];
    $s_user_password = $_POST['user_password'];
    $s_user_email = $_POST['user_email'];
    $s_user_telephone = $_POST['user_telephone'];
    $s_user_address = $_POST['user_address'];
    
    $sql_account = "UPDATE user SET user_username='$s_user_username',user_email='$s_user_email',user_telephone='$s_user_telephone',user_address='$s_user_address',user_date=NOW()  WHERE user_id='$user_id'";

    $result_account = mysqli_query($dbcon, $sql_account);
    if ($result_user) {
        //echo "บันทึกข้อมูลเรียบร้อย";
        header("Location: customer");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
 
?>