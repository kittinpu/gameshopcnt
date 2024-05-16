<html lang="en">

<head>
    <?php
    require 'session.php';
    include "../connection/connectdb.php";

    $sql_type = "SELECT * FROM typeproduct";
    $res_type = mysqli_query($dbcon, $sql_type);
    $num_type = mysqli_num_rows($res_type);

    $user_status0 = 0;

    $sql_count_user = "SELECT * FROM user WHERE user_status='$user_status0'";
    $q = mysqli_query($dbcon, $sql_count_user);
    $num = mysqli_num_rows($q);

    $user_status1 = 1;

    $sql_count_admin = "SELECT * FROM user WHERE user_status='$user_status1'";
    $q = mysqli_query($dbcon, $sql_count_admin);
    $num_admin = mysqli_num_rows($q);

    $sql_count_product = "SELECT * FROM product";
    $q = mysqli_query($dbcon, $sql_count_product);
    $num_product = mysqli_num_rows($q);

    $sql_pod = "SELECT
Sum(orderdetail.product_qty) AS ordersum,
Sum(orderdetail.total) AS sumtotal,
product.product_topic
FROM
orderdetail
INNER JOIN product ON orderdetail.product_id = product.product_id
GROUP BY
orderdetail.product_id";
    $res_pod = mysqli_query($dbcon, $sql_pod);
    $pod_name = array();
    $countpod = array();
    while ($row_pod = mysqli_fetch_assoc($res_pod)) {
        $pod_name[] = $row_pod['product_topic'];
        $countpod[] = $row_pod['ordersum'];
    }
    ?>
    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><i class="fa-brands fa-steam"> </i> สินค้าจำนวน <?php echo $num_product; ?> อย่าง</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="read_product">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body"><i class="fa-solid fa-list-ol"> </i> ประเภทสินค้าจำนวน <?php echo $num_type; ?> แบบ</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="read_type">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><i class="fa-solid fa-users"> </i> ผู้ใช้งานลูกค้าจำนวน <?php echo $num; ?> ท่าน</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="read_user">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body"><i class="fa-solid fa-users-gear"> </i> ผู้ใช้งานแอดมินจำนวน <?php echo $num_admin; ?> ท่าน</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="read_user">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        รายงานยอดขายสินค้าทั้งหมดทุกปรเภทสินค้า
                    </div>
                    <div class="card-body">
                        <div id="container" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>
        </main>
        <?php require 'components/footer.php'; ?>
        <script src="../node_modules/highcharts/highcharts.js"></script>
        <script src="../node_modules/highcharts/highcharts-3d.js"></script>
        <script>
            $(function() {
                var myChart = Highcharts.chart('container', {
                    chart: {
                        type: 'column',
                        options3d: {
                            enabled: true,
                            alpha: 10,
                            beta: 10,
                        }
                    },
                    title: {
                        text: 'รายการยอดการสั่งซื้อสินค้า'
                    },
                    xAxis: {
                        categories: [<?php echo "'" . implode("','", $pod_name) . "'"; ?>]
                    },
                    yAxis: {
                        title: {
                            text: 'ยอดขายสินค้า(จำนวน)'
                        }
                    },
                    series: [{
                        name: 'ยอดขายสินค้า(จำนวน)',
                        data: [<?php echo implode(",", $countpod); ?>],
                        dataLabels: {
                            enabled: true,
                            format: 'ขายได้จำนวน {y} อย่าง'
                        }
                    }]
                });
            });
        </script>
</body>

</html>