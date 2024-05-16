<html lang="en">

<head>
    <?php
    require 'session.php';
    include '../connection/connectdb.php';

    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Your Account Administrator ID: <?php echo $session_user_id; ?></li>
                </ol>
                <div class="card mb-4 mx-auto" style="width: 600px;">
                <a href="../assets/testimg/dev.jpg" data-lightbox="image-1" data-title="<?php echo "Welcome back is: ".$s_user_username." ,or account by ID: ".$session_user_id; ?>"><img src="../assets/testimg/dev.jpg" class="card-img-top img-thumbnail"></a>
                    <div class="card-body">
                        <h5 class="card-title"><center><?php echo "Welcome back is: ".$s_user_username." ,or account by ID: ".$session_user_id; ?></center></h5>
                        <hr>
                        <h5 class="card-text">
                            <b>Username</b>: <?php echo $s_user_username; ?><br>
                            <b>E-mail</b>: <?php echo $s_user_email; ?><br>
                            <b>Address</b>: <?php echo $s_user_address; ?>
                            <b>Status</b>: <?php if ($s_user_status == 1) { echo "Administrator"; }?><br>
                            <b>Update At</b>: <?php echo $s_user_date; ?>
                        </h5>
                        <hr>
                        <center><a href="frm_account" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"> </i> You Can Edit This Is For Your Administrator Account By Click On Button !!!</a></center>
                    </div>
                </div>
            </div>
        </main>

        <?php require 'components/footer.php'; ?>



</body>

</html>