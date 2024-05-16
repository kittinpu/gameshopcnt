<html lang="en">

<head>
    <?php
    require 'session.php';
    require "../connection/connectdb.php";
    $sql_producttable = "SELECT * FROM product INNER JOIN typeproduct ON product.typeproduct_id=typeproduct.typeproduct_id";
    $res_product = mysqli_query($dbcon, $sql_producttable);
    ?>


</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Read Game Product</li>
                </ol>
                <a href="frm_product" class="btn btn-primary mb-3"><i class="fa-solid fa-circle-plus"> </i> Insert Game Product</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fas fa-table me-1"></i>
                            ตารางรายการสินค้า Game <i class="fa-solid fa-arrow-pointer"> </i> คลิกที่รูปภาพเพื่อดูรูปภาพที่รายละเอียดใหญ่มากขึ้น
                        </center>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ประเภทสินค้า</th>
                                    <th>หัวข้อสินค้า</th>
                                    <th>สถานะสินค้า</th>
                                    <th>ราคา/บาท</th>
                                    <th>Upate At</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>รูปภาพ</th>
                                    <th>รหัสสินค้า</th>
                                    <th>ประเภทสินค้า</th>
                                    <th>หัวข้อสินค้า</th>
                                    <th>สถานะสินค้า</th>
                                    <th>ราคา/บาท</th>
                                    <th>Upate At</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                while ($row_product = mysqli_fetch_assoc($res_product)) {
                                ?>
                                    <tr>
                                        <td><a data-lightbox="roadtrip" data-title="<?php echo $row_product['product_filename']; ?>" href="../gameimg/<?php echo $row_product['product_filename']; ?>"><img class="rounded img-thumbnail" width="70px" height="40px" src="../gameimg/<?php echo $row_product['product_filename']; ?>"></a></td>
                                        <td><?php echo $row_product['product_id']; ?></td>
                                        <td><?php echo $row_product['typeproduct_name']; ?></td>
                                        <td><?php echo $row_product['product_topic']; ?></td>
                                        <td><?php if ($row_product['product_status'] == 0) {
                                                echo "All Game";
                                            }
                                            if ($row_product['product_status'] == 1) {
                                                echo "Popular Game";
                                            }
                                            if ($row_product['product_status'] == 2) {
                                                echo "Game of the years";
                                            } ?></td>
                                        <td><?php echo $row_product['product_price']; ?></td>
                                        <td><?php echo $row_product['product_date']; ?></td>
                                        <td>
                                            <a href="frm_update_product?id=<?= $row_product['product_id']; ?>"><i class="fa-solid fa-pen-to-square text-success mx-2"></i> </a>
                                            <a href="delete_product?id=<?= $row_product['product_id']; ?>"><i class="fa-solid fa-trash-can text-danger"></i> </a>
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