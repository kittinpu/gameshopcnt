<html lang="en">

<head>
    <?php
    require 'session.php';
    require "../connection/connectdb.php";
    $sql_type = "SELECT * FROM typeproduct";
    $res_type = mysqli_query($dbcon, $sql_type);
    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Read Game Type Product</li>
                </ol>
                <a href="frm_type" class="btn btn-primary mb-3"><i class="fa-solid fa-circle-plus"> </i> Insert Game Type Product</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fas fa-table me-1"></i>
                            ตารางรายการประเภทสินค้า Game
                        </center>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>รหัสสินประเภทสินค้าค้า</th>
                                    <th>ชื่อประเภทสินค้า</th>
                                    <th>Upate At</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>รหัสสินประเภทสินค้าค้า</th>
                                    <th>ชื่อประเภทสินค้า</th>
                                    <th>Upate At</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                while ($row_type = mysqli_fetch_assoc($res_type)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row_type['typeproduct_id']; ?></td>
                                        <td><?php echo $row_type['typeproduct_name']; ?></td>
                                        <td><?php echo $row_type['typeproduct_date']; ?></td>
                                        <td>
                                            <a href="frm_update_type?id=<?= $row_type['typeproduct_id']; ?>"><i class="fa-solid fa-pen-to-square text-success mx-2"></i> </a>
                                            <a href="delete_type?id=<?= $row_type['typeproduct_id']; ?>"><i class="fa-solid fa-trash-can text-danger"></i> </a>
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