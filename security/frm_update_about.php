<html lang="en">

<head>
    <?php
    require 'session.php';
    include '../connection/connectdb.php';

    $about_id = $_GET['id'];
    $sql_about = "SELECT * FROM about WHERE about_id='$about_id'";
    $res_about = mysqli_query($dbcon, $sql_about);
    $row_about = mysqli_fetch_assoc($res_about);

    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">About Us Edit ID: <?php echo $about_id; ?></li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fa-solid fa-address-card"></i>
                            About Us Edit ID: <?php echo $about_id; ?>
                        </center>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 p-3" action="update_about" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label class="form-label">About Us Topic</label>
                                <input type="text" name="about_topic" class="form-control" value="<?php echo $row_about['about_topic']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Input Your Image</label>
                                <input class="form-control" name="about_filename" type="file">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">About Us Detail</label>
                                <textarea id="editor" name="about_detail" required>
                                    <?php echo $row_about['about_detail']; ?>
                                </textarea>
                            </div>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor'))
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
                            <div class="col-md-12 mb-1">
                                <center>
                                <label class="form-label">Your Image for about us</label><br>
                                <a data-lightbox="roadtrip" data-title="<?php echo $row_about['about_filename']; ?>" href="../aboutimg/<?php echo $row_about['about_filename']; ?>"><img width="700px" height="700px" class="rounded img-thumbnail" width="100%" height="100%" src="../aboutimg/<?php echo $row_about['about_filename']; ?>"></a>
                                </center>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <input type="hidden" name="about_id" value="<?php echo $row_about['about_id']; ?>">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"> </i> Update About Us</button>
                                <a href="read_about" class="btn btn-success"><i class="fa-solid fa-backward-fast"> </i> Get Back to Table</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php require 'components/footer.php'; ?>



</body>

</html>