<?php

    include "../connection/connectdb.php";

    $about_id = $_POST['about_id'];
    $about_topic = $_POST['about_topic'];
    $about_detail = $_POST['about_detail'];

    if (is_uploaded_file($_FILES['about_filename']['tmp_name'])) {

        $sql_select = "SELECT about_filename FROM about WHERE about_id='$about_id'";
        $result_image = mysqli_query($dbcon,$sql_select);
        $row_image = mysqli_fetch_assoc($result_image);
        $image_old = $row_image['about_filename'];
        unlink("../aboutimg/".$image_old);

        $image_ext = pathinfo(basename($_FILES['about_filename']['name']), PATHINFO_EXTENSION);
        $new_image_name = 'about_'.uniqid().".".$image_ext;
        $image_path = "../aboutimg/";
        $image_upload_path = $image_path.$new_image_name;
        $success = move_uploaded_file($_FILES['about_filename']['tmp_name'], $image_upload_path);
        $sql_image = "UPDATE about SET about_filename='$new_image_name' WHERE about_id='$about_id'";
        mysqli_query($dbcon, $sql_image);

        if ($success == false) {
            echo "ไม่สามารถ Upload รูปภาพได้";
            exit();
        }
    }
    
    $sql_about = "UPDATE about SET about_topic='$about_topic',about_detail='$about_detail',about_date=NOW() WHERE about_id='$about_id'";

    $result = mysqli_query($dbcon, $sql_about);
    if ($result) {
        //echo "บันทึกข้อมูลเรียบร้อย";
        header("Location: read_about");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
 
?>