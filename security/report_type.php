<html lang="en">

<head>
    <?php
    require 'session.php';
    include "../connection/connectdb.php";

    $sql_report2 = "SELECT Count(product.product_id) AS countbytype, typeproduct.typeproduct_name FROM product INNER JOIN typeproduct ON product.typeproduct_id = typeproduct.typeproduct_id GROUP BY typeproduct.typeproduct_name";
    $result_report2 = mysqli_query($dbcon, $sql_report2);

    $data = array();

    while ($row_report2 = mysqli_fetch_assoc($result_report2)) {
        extract($row_report2);
        $data[] = array($row_report2['typeproduct_name'], intval($row_report2['countbytype']));
        $data2 = json_encode($data);
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
                    <li class="breadcrumb-item active">Report Type</li>
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
                        type: 'pie',
                        boderWidth: 1,
                        boderRadius: 3,
                        options3d: {
                            enabled: true,
                            alpha: 55,
                            beta: 0,
                        }
                    },
                    plotOptions: {
                        pie: {
                            depth: 50,
                            showInLegend: true,
                            dataLabels: {
                                style: {
                                    fontWeight: 'bold'
                                },
                                format: '{point.name} มีสินค้าทั้งสิ้นจำนวน {y} อย่าง'
                            }
                        }
                    },
                    title: {
                        text: 'รายงานจำนวนสินค้าแยกตามประเภทสินค้า'
                    },
                    subtitle: {
                        text: 'เปรียบเทียบ'
                    },
                    credits: {
                        enabled: true
                    },
                    legend: {
                        align: 'right',
                        verticalAlign: 'middle',
                        layout: 'vertical',
                        borderWidth: 2,
                        borderRadius: 3,
                    },
                    series: [{
                        name: 'ประเภทสินค้า',
                        data: <?php echo $data2; ?>
                    }]
                });
            });
        </script>
</body>

</html>