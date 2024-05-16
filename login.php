<?php
    require 'connection/connectdb.php';

    $user_email = mysqli_real_escape_string($dbcon, $_POST['email']);
    $user_password = mysqli_real_escape_string($dbcon, $_POST['password']);

    $salt = 'doratheone[]0931385645<>kingdora';
    $hash_user_password = hash_hmac('sha256', $user_password, $salt);

    $sql = "SELECT * FROM user WHERE user_email=? AND user_password=?";
    $stmt = mysqli_prepare($dbcon, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $user_email, $hash_user_password);
    mysqli_stmt_execute($stmt);
    $result_user = mysqli_stmt_get_result($stmt);

    if ($result_user->num_rows == 1) {
        session_start();
        $row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
        $_SESSION['user_id'] = $row_user['user_id'];
        header("Location: security/index");

        if ($row_user['user_status'] == 1) {
            $_SESSION['is_admin'] = 1;
            header("Location: security/index");
        } else {
            $_SESSION['is_customer'] = 0;
            $_SESSION['user_username'] = $row_user['user_username'];
            header("Location: index");
        }

    } else {
        echo 'E-mail หรือ Password ไม่ถูกต้อง';
    }

?>