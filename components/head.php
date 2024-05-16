<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Project Programming 2</title>
<link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
<link rel="icon" type="image/x-icon" href="logo/logo.png">
<link rel="stylesheet" href="node_modules/lightbox2/src/css/lightbox.css">
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

<style>
    .ck-editor__editable[role="textbox"] {
        /* Editing area */
        min-height: 250px;
    }

    .ck-content .image {
        /* Block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>

<style>
    body {
        background-image: url('assets/testimg/eldenring.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<?php
 require "connection/connectdb.php"; 
 session_start();
?>