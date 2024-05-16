<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php include 'components/head.php'; ?>
    <?php
    include "connection/connectdb.php";

    $sql_producttable = "SELECT * FROM product INNER JOIN typeproduct ON product.typeproduct_id=typeproduct.typeproduct_id";
    $res_product = mysqli_query($dbcon, $sql_producttable);

    ?>
</head>

<body class="d-flex flex-column h-100">
    <?php require 'components/navbar.php' ?>

    <main class="container py-5">
        <div class="row pb-5">
            <div class="col-md-12">
                <div class="alert alert-dark bg-black bg-gradient text-white" role="alert">
                    <center>
                        <h5>All Popular Game</h5>
                    </center>
                </div>
            </div>
            <?php while ($row_product = mysqli_fetch_assoc($res_product)) {
                if ($row_product['product_status'] == 1) {  ?>
                    <div class="col-md-3 pb-4">
                        <div class="card">
                            <a data-lightbox="roadtrip" data-title="<?php echo $row_product['product_filename']; ?>" href="gameimg/<?php echo $row_product['product_filename']; ?>"><img class="card-img-top" src="gameimg/<?php echo $row_product['product_filename']; ?>"></a>
                            <div class="card-body">
                                <h3 class="card-title pb-3"><?php if ($row_product['product_status'] == 0) {
                                                                echo "All Game";
                                                            }
                                                            if ($row_product['product_status'] == 1) {
                                                                echo "Popular Game";
                                                            }
                                                            if ($row_product['product_status'] == 2) {
                                                                echo "Game of the years";
                                                            } ?></h3>
                                <hr>
                                <p>
                                    <?php echo $row_product['product_topic']; ?><br>

                                </p>
                                <hr>
                                <a href="product_detail?product_id=<?php echo $row_product['product_id']; ?>" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass-plus"> </i> ดูรายละเอียด</a>
                                <a href="cart_customer?product_id=<?php echo $row_product['product_id']; ?>&act=add" class="btn btn-success"><i class="fa-solid fa-cart-plus"> </i> สั่งซื้อสินค้า</a>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="d-grid gap-2">
                <a href="index" class="btn btn-success mb-4"><i class="fa-solid fa-backward-fast"> </i> คลิกที่นี่เพื่อย้อนกลับ ไปที่หน้าเว็บหลัก</a>
            </div>
        </div> 
    </main>
    <br>
    <?php include 'components/footer.php'; ?>

</body>

</html>