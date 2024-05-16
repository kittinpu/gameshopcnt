<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php require 'components/head.php'; ?>
    <?php include "connection/connectdb.php";

    $sql_payment = "SELECT * FROM payment";
    $res_payment = mysqli_query($dbcon, $sql_payment);
    ?>
</head>

<body class="d-flex flex-column h-100">
    <?php require 'components/navbar.php' ?>

    <main class="container py-5">
        <div class="row pb-5">
            <?php while ($row_payment = mysqli_fetch_assoc($res_payment)) { ?>
                <div class="col-md-4 pb-3">
                    <div class="card">
                        <a data-lightbox="roadtrip" data-title="<?php echo $row_payment['payment_filename']; ?>" href="payimg/<?php echo $row_payment['payment_filename']; ?>"><img class="card-img-top" src="payimg/<?php echo $row_payment['payment_filename']; ?>"></a>
                        <div class="card-body">
                            ธนาคาร: <?php echo $row_payment['payment_bank']; ?><br>
                            ชื่อเจ้าของบัญชี: <?php echo $row_payment['payment_fullname']; ?><br>
                            เลขที่บัญชีเงินฝาก: <?php echo $row_payment['payment_numbers']; ?><br>
                            ประเภทบัญชีเงินฝาก: <?php
                                                if ($row_payment['payment_type'] == 0) {
                                                    echo "เงินฝากออมทรัพย์";
                                                }
                                                if ($row_payment['payment_type'] == 1) {
                                                    echo "เงินฝากประจำ";
                                                }
                                                if ($row_payment['payment_type'] == 2) {
                                                    echo "เงินฝากกระแสรายวัน";
                                                }
                                                ?><br>
                            เบอร์โทรติดต่อ: <?php echo $row_payment['payment_telephone']; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <?php require 'components/footer.php'; ?>

</body>

</html>