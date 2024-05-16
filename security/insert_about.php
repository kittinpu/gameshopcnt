<?php

    include "../connection/connectdb.php";

    $about_topic = $_POST['about_topic'];
    $about_detail = $_POST['about_detail'];

    $image_ext = pathinfo(basename($_FILES['about_filename']['name']), PATHINFO_EXTENSION);
    $new_image_name = 'about_'.uniqid().".".$image_ext;
    $image_path = "../aboutimg/";
    $image_upload_path = $image_path.$new_image_name;
    $success = move_uploaded_file($_FILES['about_filename']['tmp_name'], $image_upload_path);

    if ($success == false) {
        echo "ไม่สามารถ Upload รูปภาพได้";
        exit();
    }

    $sql_about = "INSERT INTO about (about_topic,about_detail,about_filename,about_date) VALUES ('$about_topic','$about_detail','$new_image_name',NOW())";

    $result = mysqli_query($dbcon, $sql_about);
    if ($result) {
        //echo "บันทึกข้อมูลเรียบร้อย";
        header("Location: read_about");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
 
?>