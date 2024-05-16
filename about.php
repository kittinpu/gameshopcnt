<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php require 'components/head.php'; ?>
    <?php
    include "connection/connectdb.php";
    $sql_about = "SELECT * FROM about";
    $res_about = mysqli_query($dbcon, $sql_about);
    ?>
</head>

<body class="d-flex flex-column h-100">
    <?php require 'components/navbar.php' ?>

    <main class="container py-4">
        <div class="row pb-3">
            <div class="col-md-12">
                <div class="row featurette text-white">
                    <?php while ($row_about = mysqli_fetch_assoc($res_about)) { ?>
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <center><?php echo $row_about['about_topic'] ?></center>
                                    </h5>
                                    <?php echo $row_about['about_detail']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <figure class="figure">
                                <a data-lightbox="roadtrip" data-title="<?php echo $row_about['about_filename']; ?>" href="aboutimg/<?php echo $row_about['about_filename']; ?>"><img class="card-img-top" src="aboutimg/<?php echo $row_about['about_filename']; ?>"></a>
                            </figure>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>

    <?php require 'components/footer.php'; ?>

</body>

</html>