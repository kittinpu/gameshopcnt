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
                            <h3><i class="fa-solid fa-cart-plus"> </i> ตะกร้าสินค้า</h3>
                        </center>
                    </div>
                    <div class="card-body mx-auto border mb-3" style="width: 900px;">
                        <?php
                        error_reporting(error_reporting() & !E_NOTICE);
                        session_start();
                        $product_id = $_REQUEST['product_id'];
                        $act = $_REQUEST['act'];

                        if ($act == 'add' && !empty($product_id)) {
                            if (!isset($_SESSION['shopping_cart'])) {

                                $_SESSION['shopping_cart'] = array();
                            } else {
                            }
                            if (isset($_SESSION['shopping_cart'][$product_id])) {
                                $_SESSION['shopping_cart'][$product_id]++;
                            } else {
                                $_SESSION['shopping_cart'][$product_id] = 1;
                            }
                        }

                        if ($act == 'remove' && !empty($product_id)) {  //ยกเลิกการสั่งซื้อ
                            unset($_SESSION['shopping_cart'][$product_id]);
                        }
                        if ($act == 'Cancel-Cart') {
                            unset($_SESSION['shopping_cart']);
                        }
                        if ($act == 'update') {
                            $amount_array = $_POST['amount'];
                            foreach ($amount_array as $product_id => $amount) {
                                $_SESSION['shopping_cart'][$product_id] = $amount;
                            }
                        }
                        ?>
                        <form id="frmcart" name="frmcart" method="post" action="?act=update">
                            <table width="100%" border="0" align="center" class="table table-bordered">
                                <tr>
                                    <thead>
                                        <td align="center"><strong>ลำดับ</strong></td>
                                        <td align="center"><strong>รูป</strong></td>
                                        <td align="center"><strong>สินค้า</strong></td>
                                        <td align="center"><strong>ราคา</strong></td>
                                        <td align="center"><strong>จำนวน</strong></td>
                                        <td align="center"><strong>รวม</strong></td>
                                        <td align="center"><strong>ลบ</strong></td>
                                    </thead>
                                </tr>
                                <?php
                                if (!empty($_SESSION['shopping_cart'])) {
                                    require 'connection/connectdb.php';
                                    foreach ($_SESSION['shopping_cart'] as $product_id => $product_qty) {
                                        $sql = "SELECT * FROM product WHERE product_id='$product_id'";
                                        $query = mysqli_query($dbcon, $sql);
                                        while ($row = mysqli_fetch_array($query)) {
                                            $sum = $row['product_price'] * $product_qty;
                                            $total += $sum;
                                            echo "<tr><tbody>";
                                            echo "<td>";
                                            echo $i += 1;
                                            echo ".";
                                            echo "</td>";
                                            echo "<td width='100'>" . "<img src='gameimg/$row[product_filename]'  width='50'/>" . "</td>";
                                            echo "<td width='334'>" . " " . $row["product_topic"] . "</td>";
                                            echo "<td width='100' align='right'>" . number_format($row["product_price"], 2) . "</td>";

                                            echo "<td width='57' align='right'>";
                                            echo "<input type='text' name='amount[$product_id]' value='$product_qty' size='2'/></td>";

                                            echo "<td width='100' align='right'>" . number_format($sum, 2) . "</td>";
                                            echo "<td width='100' align='center'><a href='cart_customer?product_id=$product_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";

                                            echo "</tr></tbody>";
                                        }
                                    }
                                    echo "<tr>";
                                    echo "<td colspan='5' align='center'>ราคารวมสุทธิ</td>";
                                    echo "<td colspan='2' align='center' >";
                                    echo "<b>";
                                    echo number_format($total, 2);
                                    echo " บาท</b>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <center>
                                <button type="submit" name="button" id="button" class="btn btn-warning"><i class="fa-solid fa-calculator"> </i> คำนวณราคาใหม่ </button>
                                <button type="button" name="Submit2" onclick="window.location = 'confirm_customer_cart.php';" class="btn btn-primary">
                                    <i class="fa-solid fa-basket-shopping"> </i> สั่งซื้อ </button>
                                <a href="cart_customer.php?act=Cancel-Cart" class="btn btn-danger"><i class="fa-regular fa-rectangle-xmark"> </i> ยกเลิกทั้งหมด</a>
                            </center>
                            <br>
                        </form>
                        <p align="center"> <a href="index" class="btn btn-success"><i class="fa-solid fa-backward-fast"> </i> กลับไปเลือกสินค้า</a></p>
                    </div>
                </div>
            </div>
    </main>
    <br>
    <?php require 'components/footer.php'; ?>

</body>

</html>