<html lang="en">

<head>
    <?php
    require 'session.php';
    require "../connection/connectdb.php";
    $sql_user = "SELECT * FROM user";
    $res_user = mysqli_query($dbcon, $sql_user);
    ?>


</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Read User</li>
                </ol>
                <a href="frm_user" class="btn btn-primary mb-3"><i class="fa-solid fa-circle-plus"> </i> Insert User</a>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fa-solid fa-table"></i>
                            ตาราง User
                        </center>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>telephone</th>
                                    <th>status</th>
                                    <th>Update At</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>telephone</th>
                                    <th>status</th>
                                    <th>Update At</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                while ($row_user = mysqli_fetch_assoc($res_user)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row_user['user_id']; ?></td>
                                        <td><?php echo $row_user['user_username']; ?></td>
                                        <td><?php echo $row_user['user_email']; ?></td>
                                        <td><?php echo $row_user['user_telephone']; ?></td>
                                        <td><?php if ($row_user['user_status'] == 0) {
                                                echo "Customer";
                                            }
                                            if ($row_user['user_status'] == 1) {
                                                echo "Administrator";
                                            } ?></td>
                                        <td><?php echo $row_user['user_date']; ?></td>
                                        <td>
                                            <a href="frm_update_user?id=<?= $row_user['user_id']; ?>"><i class="fa-solid fa-pen-to-square text-success mx-2"></i> </a>
                                            <a href="delete_user?id=<?= $row_user['user_id']; ?>"><i class="fa-solid fa-trash-can text-danger"></i> </a>
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