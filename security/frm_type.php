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
                    <li class="breadcrumb-item active">Type Product Game Insert</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fa-solid fa-table-list"></i>
                            Type Product Game
                        </center>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 p-3" action="insert_type" method="POST">
                            <div class="col-md-6">
                                <label class="form-label">Type Product Topic</label>
                                <input type="text" name="typeproduct_name" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"> </i> Create Game Type Product</button>
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