<?php include "connection/connectdb.php";

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

?>

<nav class="navbar navbar-expand-lg navbar-light bg-white p-3" aria-label="Main navigation">
    <div class="container-fluid">
        <a class="navbar-brand text-red" href="#"><i class="fa-brands fa-steam"></i> Game Shop CNT</a>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index"><i class="fa-solid fa-house-chimney"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about"><i class="fa-regular fa-face-smile"></i> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="developer"><i class="fa-solid fa-users-gear"></i> Developer</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-list-ul"> </i> ประเภทของ Game
                    </a>
                    <ul class="dropdown-menu">
                        <?php while ($row_type = mysqli_fetch_assoc($res_type)) { ?>
                            <li><a class="dropdown-item" href="read_type_game?typeproduct_id=<?php echo $row_type['typeproduct_id']; ?>"><?php echo $row_type['typeproduct_name']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['is_customer'])) { ?>
                    <li class="nav-item">
                        <span class="nav-link"><i class="fa-solid fa-user"></i> ยินดีต้อนรับคุณ: <?php echo $_SESSION['user_username']; ?></span>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="payment"><i class="fa-regular fa-credit-card"></i> Payment</a>
                </li>
                <?php if (isset($_SESSION['is_customer'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="customer"><i class="fa-solid fa-user-tie"></i> Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout"><i class="fa-solid fa-right-to-bracket"></i> Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="frm_register"><i class="fa-solid fa-user-plus"></i> Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="frm_login"><i class="fa-solid fa-lock"></i> Login</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="nav-scroller bg-red shadow-sm p-1">
    <nav class="nav" aria-label="Secondary navigation">
        <a class="nav-link" href="#">
            All Type
            <span class="badge text-bg-light rounded-pill align-text-bottom"><?php echo $num_type; ?></span>
        </a>
        <a class="nav-link" href="#">
            All Game
            <span class="badge text-bg-light rounded-pill align-text-bottom"><?php echo $num_product; ?></span>
        </a>
        <a class="nav-link" href="#">
            All User
            <span class="badge text-bg-light rounded-pill align-text-bottom"><?php echo $num; ?></span>
        </a>
        <a class="nav-link" href="#">
            All Developer
            <span class="badge text-bg-light rounded-pill align-text-bottom"><?php echo $num_admin; ?></span>
        </a>
    </nav>
</div>