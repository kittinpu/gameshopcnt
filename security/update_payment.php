<?php

    include "../connection/connectdb.php";

    $payment_id = $_POST['payment_id'];;
    $payment_bank = $_POST['payment_bank'];
    $payment_fullname = $_POST['payment_fullname'];
    $payment_numbers = $_POST['payment_numbers'];
    $payment_type = $_POST['payment_type'];
    $payment_telephone = $_POST['payment_telephone'];

    if (is_uploaded_file($_FILES['payment_filename']['tmp_name'])) {

        $sql_select = "SELECT payment_filename FROM payment WHERE payment_id='$payment_id'";
        $result_image = mysqli_query($dbcon,$sql_select);
        $row_image = mysqli_fetch_assoc($result_image);
        $image_old = $row_image['payment_filename'];
        unlink("../payimg/".$image_old);

        $image_ext = pathinfo(basename($_FILES['payment_filename']['name']), PATHINFO_EXTENSION);
        $new_image_name = 'payimg_'.uniqid().".".$image_ext;
        $image_path = "../payimg/";
        $image_upload_path = $image_path.$new_image_name;
        $success = move_uploaded_file($_FILES['payment_filename']['tmp_name'], $image_upload_path);
        $sql_image = "UPDATE payment SET payment_filename='$new_image_name' WHERE payment_id='$payment_id'";
        mysqli_query($dbcon, $sql_image);

        if ($success == false) {
            echo "ไม่สามารถ Upload รูปภาพได้";
            exit();
        }
    }
    
    $sql_payment = "UPDATE payment SET payment_bank='$payment_bank',payment_fullname='$payment_fullname',payment_numbers='$payment_numbers',payment_type='$payment_type',payment_telephone='$payment_telephone',payment_date=NOW() WHERE payment_id='$payment_id'";

    $result = mysqli_query($dbcon, $sql_payment);
    if ($result) {
        //echo "บันทึกข้อมูลเรียบร้อย";
        header("Location: read_payment");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
 
?>