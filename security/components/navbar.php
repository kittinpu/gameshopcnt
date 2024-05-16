<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index"><i class="fa-solid fa-gauge-high"> </i> Dashboard</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 text-light">
        <i class="fa-solid fa-user-shield"></i> ยินดีต้อนรับคุณ: <?php echo "$s_user_username"; ?>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="read_account">Settings</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="logout">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">core</div>
                    <a class="nav-link" href="index">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge-high"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">จัดการข้อมูล</div>
                    <a class="nav-link" href="read_product">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-gamepad"></i></div>
                        สินค้า
                    </a>
                    <a class="nav-link" href="read_type">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-table-list"></i></div>
                        ประเภทสินค้า
                    </a>
                    <a class="nav-link" href="read_user">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        ผู้ใช้งานระบบ
                    </a>
                    <a class="nav-link" href="read_about">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                        About Us
                    </a>
                    <a class="nav-link" href="read_payment">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-credit-card"></i></div>
                        Payment Us
                    </a>
                    <div class="sb-sidenav-menu-heading">รายงาน</div>
                    <a class="nav-link" href="report_product_type">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-column"></i></div>
                        สินค้าแยกประเภทสินค้า
                    </a>
                    <a class="nav-link" href="report_type">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-pie"></i></div>
                        จำนวนประเภทสินค้า
                    </a>
                    <div class="sb-sidenav-menu-heading">My Account</div>
                    <a class="nav-link" href="read_account">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-gear"></i></div>
                        ข้อมูลส่วนตัว
                    </a>
                    <a class="nav-link" href="logout">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                        ออกจากระบบ
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">ยินดีต้อนรับคุณ: <?php echo "$s_user_username"; ?></div>
            </div>
        </nav>
    </div>