<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <?php require 'components/head.php'; ?>
</head>

<body class="d-flex flex-column h-100">
    <?php require 'components/navbar.php' ?>

    <main class="container py-5">
        <div class="row pb-5">
            <div class="col-md-12">
                <center>
                    <form action="login.php" method="POST" class="login rounded text-white">
                        <h1><i class="fa-solid fa-user-lock"></i></h1>
                        <div class="mb-3">
                            <i class="fa-solid fa-envelope-open-text"> </i> <label class="form-label"> Email address</label>
                            <input type="email" class="form-control" placeholder="name@example.com" name="email" aria-describedby="emailHelp" required>
                            <div class="form-text text-white">กรุณาโปรดกรอกที่อยู่ E-mail ให้ถูกต้องครบถ้วน</div>
                        </div>
                        <div class="mb-3">
                            <i class="fa-solid fa-key"> </i> <label class="form-label"> Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                            <div class="form-text text-white">กรุณาโปรดกรอก Password ให้ถูกต้อง</div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 px-5"><i class="fa-solid fa-right-to-bracket"> </i> Please Login Your Account</button>
                    </form>
                </center>
            </div>
        </div>
    </main>

    <?php require 'components/footer.php'; ?>

</body>

</html>