<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Dashboard - SB Admin</title>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="css/styles.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css">
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<link rel="stylesheet" href="../node_modules/lightbox2/src/css/lightbox.css">
<link rel="icon" type="image/x-icon" href="../logo/logo.png">

<style>
    .ck-editor__editable[role="textbox"] {
        /* Editing area */
        min-height: 250px;
    }

    .ck-content .image {
        /* Block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>

<?php
session_start();
if (!isset($_SESSION['is_admin'])) {
    header("Location: ../frm_login");
}
require '../connection/connectdb.php';
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

mysqli_close($dbcon);
?>