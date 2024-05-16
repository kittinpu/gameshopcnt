<html lang="en">

<head>
    <?php
    require 'session.php';
    include '../connection/connectdb.php';
    ?>
</head>

<body class="sb-nav-fixed">
    <?php require 'components/navbar.php'; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Administrator ID: <?php echo $session_user_id; ?></li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <center>
                            <i class="fa-solid fa-user-gear"></i>
                            Administrator ID: <?php echo $session_user_id; ?>
                        </center>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 p-3" action="update_account" method="POST">
                            <div class="col-md-6">
                                <label class="form-label">Username</label>
                                <input type="text" name="user_username" class="form-control" value="<?php echo $s_user_username; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input type="password" name="user_password" class="form-control" value="<?php echo $s_user_password; ?>" disabled required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">E-mail</label>
                                <input type="email" name="user_email" class="form-control" value="<?php echo $s_user_email; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Numbers</label>
                                <input type="tel" name="user_telephone" class="form-control" value="<?php echo $s_user_telephone; ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">User Address</label>
                                <textarea id="editor" name="user_address" required>
                                    <?php echo $s_user_address; ?>
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
                                <input type="hidden" name="user_id" value="<?php echo $session_user_id; ?>">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"> </i> Save Your Account</button>
                                <a href="read_account" class="btn btn-success"><i class="fa-solid fa-backward-fast"> </i> Get Back to Your Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php require 'components/footer.php'; ?>
</body>

</html>