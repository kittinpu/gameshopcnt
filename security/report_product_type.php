<html lang="en">

<head>
    <?php
    require 'session.php';
    include "../connection/connectdb.php";

    $sql_report1 = "SELECT Count(product.product_id) AS countbytype, typeproduct.typeproduct_name FROM product INNER JOIN typeproduct ON product.typeproduct_id = typeproduct.typeproduct_id GROUP BY typeproduct.typeproduct_name";
    $result_report1 = mysqli_query($dbcon, $sql_report1);

    $category = array();
    $count_product = array();

    while ($row_report1 = mysqli_fetch_assoc($result_report1)) {
        $category[] = $row_report1['typeproduct_name'];
        $count_product[] = $row_report1['countbytype'];
    }

    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Report Product On Type</li>
                </ol>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="container" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php require 'components/footer.php'; ?>
        <script src="../node_modules/highcharts/highcharts.js"></script>
        <script src="../node_modules/highcharts/highcharts-3d.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const chart = Highcharts.chart('container', {
                    chart: {
                        type: 'column',
                        options3d: {
                            enabled: true,
                            alpha: 10,
                            beta: 10,
                        }
                    },
                    title: {
                        text: 'รายงานจำนวนสินค้าแยกตามประเภทสินค้า'
                    },
                    credits: {
                        enabled: true
                    },
                    xAxis: {
                        categories: [<?php echo "'" . implode("','", $category) . "'"; ?>]
                    },
                    yAxis: {
                        title: {
                            text: 'จำนวนสินค้า'
                        }
                    },
                    series: [{
                        name: 'จำนวนสินค้า',
                        data: [<?php echo implode(",", $count_product); ?>],
                        dataLabels: {
                            enabled: true,
                            format: 'สินค้าจำนวน {y} อย่าง'
                        }
                    }]
                });
            });
        </script>
</body>

</html>