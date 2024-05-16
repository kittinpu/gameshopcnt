<html lang="en">

<head>
    <?php
    require 'session.php';
    include '../connection/connectdb.php';

    $typeproduct_id = $_GET['id'];
    $sql_type = "SELECT * FROM typeproduct WHERE typeproduct_id='$typeproduct_id'";
    $res_type = mysqli_query($dbcon, $sql_type);
    $row_type = mysqli_fetch_assoc($res_type);

    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Type Product Game Edit ID: <?php echo $typeproduct_id; ?></li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fa-solid fa-pen-to-square"></i>
                            Type Product Game Edit ID: <?php echo $typeproduct_id; ?>
                        </center>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 p-3" action="update_type" method="POST">
                            <div class="col-md-12">
                                <label class="form-label">Type Product Topic</label>
                                <input type="text" name="typeproduct_name" value="<?php echo $row_type['typeproduct_name']; ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" name="typeproduct_id" value="<?php echo $row_type['typeproduct_id']; ?>">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"> </i> Save for Update</button>
                                <a href="read_type" class="btn btn-success"><i class="fa-solid fa-backward-fast"> </i> Get Back to Table</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php require 'components/footer.php'; ?>



</body>

</html>