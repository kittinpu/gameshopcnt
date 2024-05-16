<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php require 'components/head.php'; ?>
    <?php
    include "connection/connectdb.php";

    $product_id = $_GET['product_id'];
    $sql_producttable = "SELECT * FROM product INNER JOIN typeproduct ON product.typeproduct_id=typeproduct.typeproduct_id WHERE product_id='$product_id'";
    $res_product = mysqli_query($dbcon, $sql_producttable);
    $row_product = mysqli_fetch_assoc($res_product);

    ?>
</head>

<body class="d-flex flex-column h-100">
    <?php include 'components/navbar.php' ?>

    <main class="container py-5">
        <div class="row pb-5">
            <div class="col-md-12">
                <div class="card mx-auto" style="width: 1200px;">
                    <div class="card-header">
                        <center>
                            <h2>Product Detail ID: <?php echo $product_id; ?></h2>
                        </center>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h1><b>This Game is Name: <?php echo $row_product['product_topic']; ?></b></h1>
                                <h5 class="py-2">สามารถสั่งซื้อได้ในราคา: <?php echo $row_product['product_price']; ?> บาท</h5>
                                <div class="col-md-12">
                                    <div class="d-grid gap-2">
                                        <a href="index" class="btn btn-success mb-4"><i class="fa-solid fa-backward-fast"> </i> คลิกที่นี่เพื่อย้อนกลับ ไปที่หน้าเว็บหลัก</a>
                                        <a href="cart_customer?product_id=<?php echo $row_product['product_id']; ?>&act=add" class="btn btn-primary"><i class="fa-solid fa-cart-plus"> </i> สามารถสั่งซื้อสินค้า โดยการ คลิกที่ปุ่มนี้</a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <a data-lightbox="roadtrip" data-title="<?php echo $row_product['product_filename']; ?>" href="gameimg/<?php echo $row_product['product_filename']; ?>"><img class="card-img-top img-thumbnail" src="gameimg/<?php echo $row_product['product_filename']; ?>"></a>
                            </div>
                            <div class="col-md-4">
                                <h1><b>Description:</b></h1>
                                <h5><?php echo $row_product['product_detail']; ?></h5>
                                <h1><b>Type Product:</b></h1>
                                <h5><?php echo $row_product['typeproduct_name']; ?></h5>
                                <h1><b>Product Status:</b></h1>
                                <h5><?php if ($row_product['product_status'] == 0) {
                                        echo "All Game";
                                    }
                                    if ($row_product['product_status'] == 1) {
                                        echo "Popular Game";
                                    }
                                    if ($row_product['product_status'] == 2) {
                                        echo "Game of the years";
                                    } ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-4"></div>
                <div class="card mx-auto" style="width: 1200px;">
                    <?php
                    $sql_prod = "SELECT * FROM product INNER JOIN typeproduct ON product.typeproduct_id=typeproduct.typeproduct_id LIMIT 4";
                    $res_prod = mysqli_query($dbcon, $sql_prod); ?>
                    <div class="card-body">
                        <div class="row">
                            <?php while ($row_prod = mysqli_fetch_assoc($res_prod)) {
                                if ($row_prod['product_status'] == 1) {  ?>
                                    <div class="col-md-3">
                                        <a data-lightbox="roadtrip" data-title="<?php echo $row_prod['product_filename']; ?>" href="gameimg/<?php echo $row_prod['product_filename']; ?>"><img class="card-img-top" src="gameimg/<?php echo $row_prod['product_filename']; ?>"></a>
                                    </div>
                            <?php }
                            } ?>
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