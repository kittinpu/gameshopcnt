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
                    <li class="breadcrumb-item active">Product Game Insert</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fa-brands fa-product-hunt"></i>
                            Product Game
                        </center>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 p-3" action="insert_product" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label class="form-label">Product Topic</label>
                                <input type="text" name="product_topic" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Type</label>
                                <select class="form-select" name="typeproduct_name">
                                    <option value="">--กรุณาเลือกประเภทของ Game--</option>
                                    <?php
                                    include "../connection/connectdb.php";
                                    $sql_typeproduct = "SELECT * FROM typeproduct";
                                    $res_typeproduct = mysqli_query($dbcon, $sql_typeproduct);
                                    while ($row_typeproduct = mysqli_fetch_assoc($res_typeproduct)) {
                                        echo '<option value="' . $row_typeproduct['typeproduct_id'] . '">' . $row_typeproduct['typeproduct_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Input Your Image</label>
                                <input class="form-control" name="product_filename" type="file" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Price</label>
                                <input type="number" name="product_price" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Game Status</label>
                            </div>
                            <hr>
                            <div class="form-check col-md-12">
                                <input class="form-check-input" type="radio" name="product_status" value="0" checked>
                                <label class="form-check-label">
                                    All Game
                                </label>
                            </div>
                            <div class="form-check col-md-12">
                                <input class="form-check-input" type="radio" name="product_status" value="1">
                                <label class="form-check-label">
                                    Popular Game
                                </label>
                            </div>
                            <div class="form-check col-md-12">
                                <input class="form-check-input" type="radio" name="product_status" value="2">
                                <label class="form-check-label">
                                    Game of the years
                                </label>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <label class="form-label">Game Detail</label>
                                <textarea id="editor" name="product_detail" required>
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
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"> </i> Create Game Product</button>
                                <a href="read_product" class="btn btn-success"><i class="fa-solid fa-backward-fast"> </i> Get Back to Table</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php require 'components/footer.php'; ?>



</body>

</html>