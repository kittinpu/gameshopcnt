<html lang="en">

<head>
    <?php
    require 'session.php';
    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">About Us Insert</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fa-solid fa-address-card"></i>
                            About Us
                        </center>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 p-3" action="insert_about" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label class="form-label">About Us Topic</label>
                                <input type="text" name="about_topic" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Input Your Image</label>
                                <input class="form-control" name="about_filename" type="file" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">About Us Detail</label>
                                <textarea id="editor" name="about_detail" required>
                                    <p>This is some sample game detail.</p>
                                </textarea>
                            </div>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor'))
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"> </i> Create About Us</button>
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