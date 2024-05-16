<?php

    include "../connection/connectdb.php";

    $payment_bank = $_POST['payment_bank'];
    $payment_fullname = $_POST['payment_fullname'];
    $payment_numbers = $_POST['payment_numbers'];
    $payment_type = $_POST['payment_type'];
    $payment_telephone = $_POST['payment_telephone'];

    $image_ext = pathinfo(basename($_FILES['payment_filename']['name']), PATHINFO_EXTENSION);
    $new_image_name = 'payimg_'.uniqid().".".$image_ext;
    $image_path = "../payimg/";
    $image_upload_path = $image_path.$new_image_name;
    $success = move_uploaded_file($_FILES['payment_filename']['tmp_name'], $image_upload_path);

    if ($success == false) {
        echo "ไม่สามารถ Upload รูปภาพได้";
        exit();
    }

    $sql_payment = "INSERT INTO payment (payment_bank,payment_fullname,payment_numbers,payment_type,payment_telephone,payment_filename,payment_date) VALUES ('$payment_bank','$payment_fullname','$payment_numbers','$payment_type','$payment_telephone','$new_image_name',NOW())";

    $result = mysqli_query($dbcon, $sql_payment);
    if ($result) {
        //echo "บันทึกข้อมูลเรียบร้อย";
        header("Location: read_payment");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
 
?>