<html lang="en">

<head>
    <?php
    require 'session.php';
    require "../connection/connectdb.php";
    $sql_about = "SELECT * FROM about";
    $res_about = mysqli_query($dbcon, $sql_about);
    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Read About Us</li>
                </ol>
                <a href="frm_about" class="btn btn-primary mb-3"><i class="fa-solid fa-circle-plus"> </i> Insert About Us</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fas fa-table me-1"></i>
                            ตารางรายการ About Us <i class="fa-solid fa-arrow-pointer"> </i> คลิกที่รูปภาพเพื่อดูรูปภาพที่รายละเอียดใหญ่มากขึ้น
                        </center>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>About Image</th>
                                    <th>#ID</th>
                                    <th>About Topic</th>
                                    <th>Upate At</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>About Image</th>
                                    <th>#ID</th>
                                    <th>About Topic</th>
                                    <th>Upate At</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                while ($row_about = mysqli_fetch_assoc($res_about)) {
                                ?>
                                    <tr>
                                        <td><a data-lightbox="roadtrip" data-title="<?php echo $row_about['about_filename']; ?>" href="../aboutimg/<?php echo $row_about['about_filename']; ?>"><img class="rounded img-thumbnail" width="70px" height="40px" src="../aboutimg/<?php echo $row_about['about_filename']; ?>"></a></td>
                                        <td><?php echo $row_about['about_id']; ?></td>
                                        <td><?php echo $row_about['about_topic']; ?></td>
                                        <td><?php echo $row_about['about_date']; ?></td>
                                        <td>
                                            <a href="frm_update_about?id=<?= $row_about['about_id']; ?>"><i class="fa-solid fa-pen-to-square text-success mx-2"></i> </a>
                                            <a href="delete_about?id=<?= $row_about['about_id']; ?>"><i class="fa-solid fa-trash-can text-danger"></i> </a>
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