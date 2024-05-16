<html lang="en">

<head>
    <?php
    require 'session.php';
    include '../connection/connectdb.php';

    $product_id = $_GET['id'];
    $sql_product = "SELECT * FROM product WHERE product_id='$product_id'";
    $res_product = mysqli_query($dbcon, $sql_product);
    $row_product = mysqli_fetch_assoc($res_product);

    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Product Game Edit ID: <?php echo $product_id; ?></li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fa-solid fa-pen-to-square"></i>
                            Product Game Edit ID: <?php echo $product_id; ?>
                        </center>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 p-3" action="update_product" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label class="form-label">Product Topic</label>
                                <input type="text" name="product_topic" value="<?php echo $row_product['product_topic']; ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Type</label>
                                <select class="form-select" name="typeproduct_name">
                                    <?php
                                    $sql_typeproduct = "SELECT * FROM typeproduct";
                                    $res_typeproduct = mysqli_query($dbcon, $sql_typeproduct);
                                    while ($row_typeproduct = mysqli_fetch_assoc($res_typeproduct)) {
                                        if ($row_typeproduct['typeproduct_id'] == $row_product['typeproduct_id']) {
                                            echo '<option value="' . $row_typeproduct['typeproduct_id'] . '" selected>' . $row_typeproduct['typeproduct_name'] . '</option>';
                                        } else {
                                            echo '<option value="' . $row_typeproduct['typeproduct_id'] . '">' . $row_typeproduct['typeproduct_name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Input Your Image</label>
                                <input class="form-control" name="product_filename" type="file">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Price</label>
                                <input type="number" name="product_price" class="form-control" value="<?php echo $row_product['product_price']; ?>" required>
                            </div>
                            <hr>
                            <div class="col-md-12 mb-1">
                                <label class="form-label">Your Image for this Game</label>
                                <a data-lightbox="roadtrip" data-title="<?php echo $row_product['product_filename']; ?>" href="../gameimg/<?php echo $row_product['product_filename']; ?>"><img class="rounded img-thumbnail" width="100%" height="100%" src="../gameimg/<?php echo $row_product['product_filename']; ?>"></a>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <label class="form-label">Game Status</label>
                            </div>
                            <?php 
                                if ($row_product['product_status'] == 0) {
                                    echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="product_status" value="0" checked><label class="form-check-label">All Game</label></div>';
                                    echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="product_status" value="1"><label class="form-check-label">Popular Game</label></div>';
                                    echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="product_status" value="2"><label class="form-check-label">Game of the years</label></div>';
                                }else if ($row_product['product_status'] == 1) {
                                    echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="product_status" value="0"><label class="form-check-label">All Game</label></div>';
                                    echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="product_status" value="1" checked><label class="form-check-label">Popular Game</label></div>';
                                    echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="product_status" value="2"><label class="form-check-label">Game of the years</label></div>';
                                } else {
                                    echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="product_status" value="0"><label class="form-check-label">All Game</label></div>';
                                    echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="product_status" value="1"><label class="form-check-label">Popular Game</label></div>';
                                    echo '<div class="form-check col-md-12"><input class="form-check-input" type="radio" name="product_status" value="2" checked><label class="form-check-label">Game of the years</label></div>';
                                }
                            ?>
                            <hr>
                            <div class="col-md-12">
                                <label class="form-label">Game Detail</label>
                                <textarea id="editor" name="product_detail" required>
                                    <?php echo $row_product['product_detail']; ?>
                                </textarea>
                            </div>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor'))
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
                            <div class="col-md-12">
                                <input type="hidden" name="product_id" value="<?php echo $row_product['product_id']; ?>">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"> </i> Save for Update</button>
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