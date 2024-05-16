<?php
    require "../connection/connectdb.php";

    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_telephone = $_POST['user_telephone'];
    $user_address = $_POST['user_address'];
    $user_status = $_POST['user_status'];

    if ($user_username == "admin") { 
        echo 'ห้ามใช้ username เป็น admin';
        exit;
    }

    $salt = 'doratheone[]0931385645<>kingdora';
    $hash_user_password = hash_hmac('sha256', $user_password, $salt);

    $query = "INSERT INTO user (user_username,user_email,user_password,user_telephone,user_address,user_status,user_date) VALUES ('$user_username','$user_email','$hash_user_password','$user_telephone','$user_address','$user_status',NOW())";
    $result = mysqli_query($dbcon,$query);

    if ($result) {
        header("Location: read_user");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }

    mysqli_close($dbcon);

?>