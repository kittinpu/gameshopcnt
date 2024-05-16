<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <?php

    require 'components/head.php';
    if (!isset($_SESSION['is_customer'])) {
        header("Location: frm_login");
    }
    include "connection/connectdb.php";
    require 'session_customer.php';

    ?>
</head>

<body class="d-flex flex-column h-100">
    <?php include 'components/navbar.php' ?>

    <main class="container py-5">
        <div class="row pb-5">
            <div class="col-md-3">
                <?php include "left_list_customer.php"; ?>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header mb-3">
                        <center>
                            <h3><i class="fa-solid fa-user-lock"> </i> รายละเอียดส่วนตัว</h3>
                        </center>
                    </div>
                    <div class="card-body mx-auto border mb-3" style="width: 600px;">
                        <a href="assets/testimg/dev.jpg" data-lightbox="image-1" data-title="<?php echo "Welcome back is: " . $s_user_username . " ,or account by ID: " . $session_user_id; ?>"><img src="assets/testimg/dev.jpg" class="card-img-top img-thumbnail"></a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <center><?php echo "Welcome back is: " . $s_user_username . " ,or account by ID: " . $session_user_id; ?></center>
                            </h5>
                            <hr>
                            <h5 class="card-text">
                                <b>Username</b>: <?php echo $s_user_username; ?><br>
                                <b>E-mail</b>: <?php echo $s_user_email; ?><br>
                                <b>Address</b>: <?php echo $s_user_address; ?>
                                <b>Status</b>: <?php if ($s_user_status == 0) {
                                                    echo "Customer";
                                                } ?><br>
                                <b>Update At</b>: <?php echo $s_user_date; ?>
                            </h5>
                            <hr>
                            <center><a href="frm_customer" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"> </i> You Can Edit This Is For Your Customer Account By Click On Button !!!</a></center>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <br>
    <?php require 'components/footer.php'; ?>

</body>

</html>