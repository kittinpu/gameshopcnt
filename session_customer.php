<?php
include "connection/connectdb.php";
$session_user_id = $_SESSION['user_id'];

$qry_user = "SELECT * FROM user WHERE user_id='$session_user_id'";
$result_user = mysqli_query($dbcon, $qry_user);
if ($result_user) {
    $row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
    $s_user_username = $row_user['user_username'];
    $s_user_email = $row_user['user_email'];
    $s_user_telephone = $row_user['user_telephone'];
    $s_user_address = $row_user['user_address'];
    $s_user_status = $row_user['user_status'];
    $s_user_password = $row_user['user_password'];
    $s_user_date = $row_user['user_date'];

    mysqli_free_result($result_user);
}
?>