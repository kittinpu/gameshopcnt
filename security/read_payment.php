<html lang="en">

<head>
    <?php
    require 'session.php';
    require "../connection/connectdb.php";
    $sql_paymenttable = "SELECT * FROM payment";
    $res_payment = mysqli_query($dbcon, $sql_paymenttable);
    ?>


</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Read Your Payment</li>
                </ol>
                <a href="frm_payment" class="btn btn-primary mb-3"><i class="fa-solid fa-circle-plus"> </i> Insert Your Payment</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fas fa-table me-1"></i>
                            ตาราง Payment <i class="fa-solid fa-arrow-pointer"> </i> คลิกที่รูปภาพเพื่อดูรูปภาพที่รายละเอียดใหญ่มากขึ้น
                        </center>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>#ID</th>
                                    <th>ธนาคาร</th>
                                    <th>ชื่อเจ้าของบัญชี</th>
                                    <th>เลขที่บัญชี</th>
                                    <th>ประเภทบัญชี</th>
                                    <th>Upate At</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>#ID</th>
                                    <th>ธนาคาร</th>
                                    <th>ชื่อเจ้าของบัญชี</th>
                                    <th>เลขที่บัญชี</th>
                                    <th>ประเภทบัญชี</th>
                                    <th>Upate At</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                while ($row_payment = mysqli_fetch_assoc($res_payment)) {
                                ?>
                                    <tr>
                                        <td><a data-lightbox="roadtrip" data-title="<?php echo $row_payment['payment_filename']; ?>" href="../payimg/<?php echo $row_payment['payment_filename']; ?>"><img class="rounded img-thumbnail" width="50px" height="50px" src="../payimg/<?php echo $row_payment['payment_filename']; ?>"></a></td>
                                        <td><?php echo $row_payment['payment_id']; ?></td>
                                        <td><?php echo $row_payment['payment_bank']; ?></td>
                                        <td><?php echo $row_payment['payment_fullname']; ?></td>
                                        <td><?php echo $row_payment['payment_numbers']; ?></td>
                                        <td>
                                            <?php  
                                                if ($row_payment['payment_type'] == 0) {
                                                    echo "เงินฝากออมทรัพย์";
                                                } else if ($row_payment['payment_type'] == 1) {
                                                    echo "เงินฝากประจำ";
                                                } else if ($row_payment['payment_type'] == 2) {
                                                    echo "เงินฝากกระแสรายวัน";
                                                } else {
                                                    echo "Cannot Create";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $row_payment['payment_date']; ?></td>
                                        <td>
                                            <a href="frm_update_payment?id=<?= $row_payment['payment_id']; ?>"><i class="fa-solid fa-pen-to-square text-success mx-2"></i> </a>
                                            <a href="delete_payment?id=<?= $row_payment['payment_id']; ?>"><i class="fa-solid fa-trash-can text-danger"></i> </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <?php require 'components/footer.php'; ?>
</body>

</html>