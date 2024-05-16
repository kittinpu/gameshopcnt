<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php require 'components/head.php'; ?>
</head>

<body class="d-flex flex-column h-100">
    <?php require 'components/navbar.php' ?>

    <main class="vh-100 py-5 mb-5">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black login2 text-white" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>

                                    <form action="cre_register.php" method="POST" class="mx-1 mx-md-4" enctype="multipart/form-data">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa-regular fa-circle-user fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="username" placeholder="username" required />
                                                <label class="form-label">Your Username</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa-solid fa-envelope-open-text fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="email" class="form-control" name="email" placeholder="name@example.com" required />
                                                <label class="form-label">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa-solid fa-key fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="password" class="form-control" name="password" placeholder="password" required />
                                                <label class="form-label">Your Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa-solid fa-phone-volume fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="tel" class="form-control" name="telephone" placeholder="Phone Numbers" value="" required />
                                                <label class="form-label"">Your Phone numbers</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa-solid fa-location-dot fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <textarea class="form-control" name="address" rows="3" required>กรุณาโปรดกรอกข้อมูลที่อยู่จัดส่งสินค้า</textarea>
                                                <label class="form-label"">Your Address</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="assets/testimg/register.jpg" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="py-5"></div>
    <div class="py-4"></div>
    <?php require 'components/footer.php'; ?>

</body>

</html>