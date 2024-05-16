<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php require 'components/head.php'; ?>
    <?php include "connection/connectdb.php";

    $sql_dveloper = "SELECT * FROM user";
    $res_dveloper = mysqli_query($dbcon, $sql_dveloper);
    ?>
</head>

<body class="d-flex flex-column h-100">
    <?php require 'components/navbar.php' ?>

    <main class="container py-5 pt-5">
        <div class="row pb-5">
            <?php while ($row_dveloper = mysqli_fetch_assoc($res_dveloper)) { if ($row_dveloper['user_status'] == 1) { ?>
            <div class="col-md-4 pb-3">
                <div class="card">
                    <img src="assets/testimg/dev.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">
                            Username: <?php echo $row_dveloper['user_username']; ?><br>
                            E-mail: <?php echo $row_dveloper['user_email']; ?><br>
                            Telephone Numbers: <?php echo $row_dveloper['user_telephone']; ?><br>
                            Status: <?php echo "Administrator"; ?>
                        </h5>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </main>

    <?php require 'components/footer.php'; ?>

</body>

</html>