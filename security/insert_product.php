<?php

    include "../connection/connectdb.php";

    $typeproduct_id = $_POST['typeproduct_name'];
    $product_topic = $_POST['product_topic'];
    $product_price = $_POST['product_price'];
    $product_status = $_POST['product_status'];
    $product_detail = $_POST['product_detail'];

    $image_ext = pathinfo(basename($_FILES['product_filename']['name']), PATHINFO_EXTENSION);
    $new_image_name = 'game_'.uniqid().".".$image_ext;
    $image_path = "../gameimg/";
    $image_upload_path = $image_path.$new_image_name;
    $success = move_uploaded_file($_FILES['product_filename']['tmp_name'], $image_upload_path);

    if ($success == false) {
        echo "ไม่สามารถ Upload รูปภาพได้";
        exit();
    }

    $sql_product = "INSERT INTO product (product_topic,typeproduct_id,product_price,product_detail,product_filename,product_status,product_date) VALUES ('$product_topic','$typeproduct_id','$product_price','$product_detail','$new_image_name','$product_status',NOW())";

    $result = mysqli_query($dbcon, $sql_product);
    if ($result) {
        //echo "บันทึกข้อมูลเรียบร้อย";
        header("Location: read_product");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
 
?>