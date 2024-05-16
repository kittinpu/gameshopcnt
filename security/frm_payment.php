<html lang="en">

<head>
    <?php
    require 'session.php';
    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Insert Your Payment</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fa-regular fa-credit-card"></i>
                            Your Payment
                        </center>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 p-3" action="insert_payment" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label class="form-label">Your Name Bank</label>
                                <input type="text" name="payment_bank" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Input Your Image</label>
                                <input class="form-control" name="payment_filename" type="file" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Payment Numbers</label>
                                <input class="form-control" name="payment_numbers" type="text" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Your Telephone Numbers</label>
                                <input type="tel" name="payment_telephone" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Your Full Name Firstname and Lastname</label>
                                <input type="text" name="payment_fullname" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Game Status</label>
                            </div>
                            <hr>
                            <div class="form-check col-md-12">
                                <input class="form-check-input" type="radio" name="payment_type" value="0" checked>
                                <label class="form-check-label">
                                    เงินฝากออมทรัพย์
                                </label>
                            </div>
                            <div class="form-check col-md-12">
                                <input class="form-check-input" type="radio" name="payment_type" value="1">
                                <label class="form-check-label">
                                    เงินฝากประจำ
                                </label>
                            </div>
                            <div class="form-check col-md-12">
                                <input class="form-check-input" type="radio" name="payment_type" value="2">
                                <label class="form-check-label">
                                    เงินฝากกระแสรายวัน
                                </label>
                            </div>
                            <hr>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"> </i> Create Your Payment</button>
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