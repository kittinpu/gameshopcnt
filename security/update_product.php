<?php

    include "../connection/connectdb.php";

    $product_id = $_POST['product_id'];
    $typeproduct_id = $_POST['typeproduct_name'];
    $product_topic = $_POST['product_topic'];
    $product_price = $_POST['product_price'];
    $product_status = $_POST['product_status'];
    $product_detail = $_POST['product_detail'];

    if (is_uploaded_file($_FILES['product_filename']['tmp_name'])) {

        $sql_select = "SELECT product_filename FROM product WHERE product_id='$product_id'";
        $result_image = mysqli_query($dbcon,$sql_select);
        $row_image = mysqli_fetch_assoc($result_image);
        $image_old = $row_image['product_filename'];
        unlink("../gameimg/".$image_old);

        $image_ext = pathinfo(basename($_FILES['product_filename']['name']), PATHINFO_EXTENSION);
        $new_image_name = 'game_'.uniqid().".".$image_ext;
        $image_path = "../gameimg/";
        $image_upload_path = $image_path.$new_image_name;
        $success = move_uploaded_file($_FILES['product_filename']['tmp_name'], $image_upload_path);
        $sql_image = "UPDATE product SET product_filename='$new_image_name' WHERE product_id='$product_id'";
        mysqli_query($dbcon, $sql_image);

        if ($success == false) {
            echo "ไม่สามารถ Upload รูปภาพได้";
            exit();
        }
    }
    
    $sql_product = "UPDATE product SET product_topic='$product_topic',typeproduct_id='$typeproduct_id',product_price='$product_price',product_detail='$product_detail',product_status='$product_status',product_date=NOW() WHERE product_id='$product_id'";

    $result = mysqli_query($dbcon, $sql_product);
    if ($result) {
        //echo "บันทึกข้อมูลเรียบร้อย";
        header("Location: read_product");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
 
?>