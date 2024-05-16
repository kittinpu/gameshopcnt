<?php
    require "connection/connectdb.php";

    $user_username = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_telephone = $_POST['telephone'];
    $user_address = $_POST['address'];

    if ($user_username == "admin") { 
        echo 'ห้ามใช้ username เป็น admin';
        exit;
    }

    $salt = 'doratheone[]0931385645<>kingdora';
    $hash_user_password = hash_hmac('sha256', $user_password, $salt);

    $query = "INSERT INTO user (user_username,user_email,user_password,user_telephone,user_address,user_date) VALUES ('$user_username','$user_email','$hash_user_password','$user_telephone','$user_address',NOW())";
    $result = mysqli_query($dbcon,$query);

    if ($result) {
        header("Location: frm_login");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }

    mysqli_close($dbcon);

?>