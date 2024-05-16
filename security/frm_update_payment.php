<html lang="en">

<head>
    <?php
    require 'session.php';
    include "../connection/connectdb.php";

    $payment_id = $_GET['id'];
    $sql_payment = "SELECT * FROM payment WHERE payment_id='$payment_id'";
    $res_payment = mysqli_query($dbcon, $sql_payment);
    $row_payment = mysqli_fetch_assoc($res_payment);

    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Update Your Payment ID: <?php echo $payment_id; ?></li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fa-regular fa-credit-card"></i>
                            Update Your Payment ID: <?php echo $payment_id; ?>
                        </center>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 p-3" action="update_payment" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label class="form-label">Your Name Bank</label>
                                <input type="text" name="payment_bank" class="form-control" value="<?php echo $row_payment['payment_bank']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Input Your Image</label>
                                <input class="form-control" name="payment_filename" value="<?php echo $row_payment['payment_filename']; ?>" type="file">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Payment Numbers</label>
                                <input class="form-control" name="payment_numbers" value="<?php echo $row_payment['payment_numbers']; ?>" type="text" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Your Telephone Numbers</label>
                                <input type="tel" name="payment_telephone" value="<?php echo $row_payment['payment_telephone']; ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Your Full Name Firstname and Lastname</label>
                                <input type="text" name="payment_fullname" value="<?php echo $row_payment['payment_fullname']; ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Game Status</label>
                            </div>
                            <hr>
                            <div class="col-md-12 mb-1">
                                <center>
                                    <label class="form-label">Your Image for Payment</label><br>
                                    <a data-lightbox="roadtrip" data-title="<?php echo $row_payment['payment_filename']; ?>" href="../payimg/<?php echo $row_payment['payment_filename']; ?>"><img width="700px" height="700px" class="rounded img-thumbnail" width="100%" height="100%" src="../payimg/<?php echo $row_payment['payment_filename']; ?>"></a>
                                </center>
                            </div>
                            <hr>
                            <?php
                            if ($row_payment['payment_type'] == 0) {
                                echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="payment_type" value="0" checked><label class="form-check-label">เงินฝากออมทรัพย์</label></div>';
                                echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="payment_type" value="1"><label class="form-check-label">เงินฝากประจำ</label></div>';
                                echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="payment_type" value="2"><label class="form-check-label">เงินฝากกระแสรายวัน</label></div>';
                            } else if ($row_payment['payment_type'] == 1) {
                                echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="payment_type" value="0"><label class="form-check-label">เงินฝากออมทรัพย์</label></div>';
                                echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="payment_type" value="1" checked><label class="form-check-label">เงินฝากประจำ</label></div>';
                                echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="payment_type" value="2"><label class="form-check-label">เงินฝากกระแสรายวัน</label></div>';
                            } else if ($row_payment['payment_type'] == 2) {
                                echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="payment_type" value="0"><label class="form-check-label">เงินฝากออมทรัพย์</label></div>';
                                echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="payment_type" value="1"><label class="form-check-label">เงินฝากประจำ</label></div>';
                                echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="payment_type" value="2" checked><label class="form-check-label">เงินฝากกระแสรายวัน</label></div>';
                            } else {
                                echo 'Cannot';
                            }
                            ?>
                            <hr>
                            <div class="col-md-12">
                                <input type="hidden" name="payment_id" value="<?php echo $row_payment['payment_id']; ?>">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"> </i> Update Your Payment</button>
                                <a href="read_payment" class="btn btn-success"><i class="fa-solid fa-backward-fast"> </i> Get Back to Table</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php require 'components/footer.php'; ?>



</body>

</html>