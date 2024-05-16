<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php
    require 'components/head.php';

    if (!isset($_SESSION['is_customer'])) {
        header("Location: frm_login.php");
        exit();
    }

    include "connection/connectdb.php";

    $user_id = $_SESSION['user_id'];
    $order_status = 0;  // Assuming you have a predefined status to filter

    // SQL Query
    $sql_pdd = "SELECT
                    COUNT(orderdetail.detail_id) AS sumproduct,
                    user.user_username,
                    user.user_email,
                    user.user_telephone,
                    user.user_address,
                    order.order_id,
                    order.order_datesave,
                    SUM(orderdetail.total) AS sumtotal,
                    user.user_id
                FROM
                    `order`
                INNER JOIN orderdetail ON orderdetail.order_id = `order`.order_id
                INNER JOIN user ON `order`.user_id = user.user_id
                WHERE
                    user.user_id = '$user_id' AND `order`.order_status = '$order_status'
                GROUP BY
                    user.user_username,
                    user.user_email,
                    user.user_telephone,
                    user.user_address,
                    order.order_id,
                    order.order_datesave";

    // Execute Query and Check for Errors
    $res_pdd = mysqli_query($dbcon, $sql_pdd);

    if (!$res_pdd) {
        echo "Error: " . mysqli_error($dbcon);
        exit();
    }
    ?>
</head>

<body class="d-flex flex-column h-100">
    <?php include 'components/navbar.php'; ?>

    <main class="container py-5">
        <div class="row pb-5">
            <div class="col-md-3">
                <?php include "left_list_customer.php"; ?>
            </div>
            <div class="col-md-9">
                <table class="table table-bordered" class="display" border="1">
                    <thead>
                        <tr>
                            <th align="center">รหัสซื้อ</th>
                            <th align="center">ข้อมูลผู้สั่งซื้อ</th>
                            <th align="center">ข้อมูลการสั่งซื้อ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row_pdd = mysqli_fetch_assoc($res_pdd)) { ?>
                            <tr>
                                <td align="center">
                                    <font color="blue">#<?php echo $row_pdd['order_id']; ?></font><br>
                                </td>
                                <td>
                                    <font color="blue">username</font> : <font color="green"><?php echo $row_pdd['user_username']; ?></font> <br>
                                    <font color="blue">เบอร์ติดต่อ</font> : <font color="green"><?php echo $row_pdd['user_telephone']; ?></font><br>
                                    <font color="blue">ที่อยู่จัดส่ง</font> : <font color="green"><?php echo $row_pdd['user_address']; ?></font><br>
                                    <font color="blue">ที่อยู่อีเมลล์</font> : <font color="green"><?php echo $row_pdd['user_email']; ?></font><br>
                                </td>
                                <td>
                                    <font color="blue">ทำรายการเมื่อ</font> : <font color="green"><?php echo $row_pdd['order_datesave']; ?></font><br>
                                    <font color="blue">ราคารวมสุทธิ</font> : <font color="red"><?php echo $row_pdd['sumtotal']; ?></font> <font color="blue">บาท</font><br>
                                    <font color="blue">สถานะรายการ</font> : <font color="red">ยังไม่ได้ชำระเงิน</font>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4"><font color="blue">อัพโหลดสลิป :</font></div>
                                        <div class="col-md-8" align="left" style="margin-left: -45px;">
                                            <form action="insert_slip" method="POST" enctype="multipart/form-data">
                                                <input type="file" name="order_slip" class="form-control-file">
                                                <input type="hidden" name="order_id" value="<?php echo $row_pdd['order_id']; ?>">
                                                <input type="hidden" name="order_status" value="<?php echo $order_status; ?>">
                                                <input type="submit" value="บันทึก">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <br>
    <?php require 'components/footer.php'; ?>
</body>

</html>
