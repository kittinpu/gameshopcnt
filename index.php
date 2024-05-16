<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php require 'components/head.php'; ?>
    <?php
    include "connection/connectdb.php";

    $sql_producttable = "SELECT * FROM product INNER JOIN typeproduct ON product.typeproduct_id=typeproduct.typeproduct_id LIMIT 2";
    $res_product = mysqli_query($dbcon, $sql_producttable);

    $sql_producttable3 = "SELECT * FROM product INNER JOIN typeproduct ON product.typeproduct_id=typeproduct.typeproduct_id LIMIT 6";
    $res_product3 = mysqli_query($dbcon, $sql_producttable3);

    ?>
</head>

<body class="d-flex flex-column h-100">
    <?php include 'components/navbar.php' ?>

    <main class="container py-5">
        <div class="row pb-5">
            <div class="col-md-12">
                <div class="alert alert-dark bg-black bg-gradient text-white" role="alert">
                    <center>
                        <h5>Top Popular Game</h5>
                    </center>
                </div>
            </div>
            <?php while ($row_product = mysqli_fetch_assoc($res_product)) {
                if ($row_product['product_status'] == 1) {  ?>
                    <div class="col-md-4">
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
            <div class="col-md-4">
                <div class="row">
                    <?php
                    $sql_producttable2 = "SELECT * FROM product INNER JOIN typeproduct ON product.typeproduct_id=typeproduct.typeproduct_id ORDER BY product_id DESC LIMIT 4";
                    $res_product2 = mysqli_query($dbcon, $sql_producttable2);
                    while ($row_product2 = mysqli_fetch_assoc($res_product2)) {
                    ?>
                        <div class="col-md-6 pb-2">
                            <div class="card">
                                <a data-lightbox="roadtrip" data-title="<?php echo $row_product2['product_filename']; ?>" href="gameimg/<?php echo $row_product2['product_filename']; ?>"><img class="card-img-top" src="gameimg/<?php echo $row_product2['product_filename']; ?>"></a>
                                <div class="card-body">
                                    <p><?php echo $row_product2['product_topic']; ?></p>
                                    <a href="product_detail?product_id=<?php echo $row_product2['product_id']; ?>" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass-plus"> </i> ดู</a>
                                    <a href="cart_customer?product_id=<?php echo $row_product2['product_id']; ?>&act=add" class="btn btn-success"><i class="fa-solid fa-cart-plus"> </i> สั่งซื้อ</a>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="d-grid gap-2">
                <a href="read_allPopular_game" class="btn btn-primary mb-4"><i class="fa-solid fa-database"> </i> คลิกที่นี่เพื่อดูสินค้า Popular Game ทั้งหมดในสต๊อกสินค้าของเรา</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="alert alert-dark bg-black bg-gradient text-white" role="alert">
                <center>
                    <h5>All Product Game</h5>
                </center>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-3">
            <?php while ($row_product3 = mysqli_fetch_assoc($res_product3)) { ?>
                <div class="col-md-3">
                    <figure class="figure">
                        <a data-lightbox="roadtrip" data-title="<?php echo $row_product3['product_filename']; ?>" href="gameimg/<?php echo $row_product3['product_filename']; ?>"><img class="rounded img-thumbnail card-img-top" src="gameimg/<?php echo $row_product3['product_filename']; ?>"></a>
                    </figure>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-12">
            <div class="d-grid gap-2">
                <a href="read_all_game" class="btn btn-primary mb-4"><i class="fa-solid fa-database"> </i> คลิกที่นี่เพื่อดูสินค้า All Game ทั้งหมดในสต๊อกสินค้าของเรา</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="alert alert-dark bg-black bg-gradient text-white" role="alert">
                <center>
                    <h5>Game Of The Years In 2020-2024</h5>
                    <a href="read_gameofthe_years" class="btn btn-primary mb-4 mt-3"><i class="fa-solid fa-database"> </i> คลิกที่นี่เพื่อดูสินค้า Game Of The Years In 2020-2024 ทั้งหมดในสต๊อกสินค้าของเรา</a>
                </center>
            </div>
        </div>
        
    </main>
    <br>
    <?php require 'components/footer.php'; ?>

</body>

</html>