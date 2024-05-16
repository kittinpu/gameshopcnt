<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR</title>
    <?php
    $error_title = '404 Page Not Found';
    $error_message = 'The Document/file requested was not found on this server';
    ?>
</head>

<body>
    <center>
        <?php for($i=0; $i<=12; $i++){echo "<br>";} ?>
        <h1><?php echo $error_title; ?></h1>
        <h3><?php echo $error_message; ?></h5>
    </center>
</body>

</html>