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
                            <h3><i class="fa-solid fa-square-check"> </i> Confirm Product</h3>
                        </center>
                    </div>
                    <div class="card-body mx-auto border mb-3" style="width: 900px;">
                        <?php

                        ?>
                        <div class="col-md-12">

                            <p><a href="cart_customer">กลับหน้าตะกร้าสินค้า</a> </p>
                            <table width="1366px" border="1" align="center" class="table">
                                <tr>
                                    <td width="1366px" colspan="5" align="center">
                                        <strong>สั่งซื้อสินค้า</strong>
                                    </td>
                                </tr>
                                <tr class="success">
                                    <td align="center">ลำดับ</td>
                                    <td align="center">สินค้า</td>
                                    <td align="center">ราคา</td>
                                    <td align="center">จำนวน</td>
                                    <td align="center">รวม/รายการ</td>
                                </tr>
                                <?php
                                require 'connection/connectdb.php';
                                $total = 0;
                                $i = 0;
                                foreach ($_SESSION['shopping_cart'] as $product_id => $product_qty) {
                                    $sql = "SELECT * FROM product WHERE product_id=$product_id";
                                    $query = mysqli_query($dbcon, $sql);
                                    $row = mysqli_fetch_array($query);
                                    $sum = $row['product_price'] * $product_qty;
                                    $total += $sum;
                                    echo "<tr>";
                                    echo "<td align='center'>";
                                    echo $i += 1;
                                    echo "</td>";
                                    echo "<td>" . $row["product_topic"] . "</td>";
                                    echo "<td align='right'>" . number_format($row['product_price'], 2) . "</td>";
                                    echo "<td align='right'>$product_qty</td>";
                                    echo "<td align='right'>" . number_format($sum, 2) . "</td>";
                                    echo "</tr>";
                                }
                                echo "<tr>";
                                echo "<td  align='right' colspan='4'><b>รวม</b></td>";
                                echo "<td align='right'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                                echo "</tr>";
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container" style="margin-top: 10px;">
                    <div class="row">
                        <?php
                        $user_id = $_SESSION['user_id'];
                        $sql = "SELECT * FROM user WHERE user_id='$user_id'";
                        $res_user = mysqli_query($dbcon, $sql);
                        $row_user = mysqli_fetch_assoc($res_user);
                        ?>
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <form action="saveorder" method="POST" class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-12" align="center">
                                        <button type="submit" class="btn btn-primary" id="btn">
                                            <i class="fa-regular fa-square-check"> </i> ยืนยันสั่งซื้อสินค้า Product Game </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br>
    <?php require 'components/footer.php'; ?>

</body>

</html>