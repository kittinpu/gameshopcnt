<?php

include 'connection/connectdb.php';

// Check if all necessary POST data is set
if(isset($_POST['order_id'], $_POST['order_status'])) {
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    // Get image extension
    $image_ext = pathinfo(basename($_FILES['order_slip']['name']), PATHINFO_EXTENSION);
    $slip_image_name = 'slip_' . uniqid() . "." . $image_ext;
    $image_path = "img_slip/";
    $image_upload_path = $image_path . $slip_image_name;

    // Upload image
    $success = move_uploaded_file($_FILES['order_slip']['tmp_name'], $image_upload_path);
    if ($success == FALSE) {
        echo "ไม่สามารถ upload รูปภาพได้";
        exit();
    }

    // Update order status and slip image name in database
    $sql = "UPDATE `order` SET order_status='1', order_slip='$slip_image_name' WHERE order_id='$order_id'";

    $result = mysqli_query($dbcon, $sql);

    if ($result) {
        header("Location: customer");
    } else {
        // Display error message with specific database connection error
        echo 'เกิดข้อผิดพลาดขึ้น: ' . mysqli_error($dbcon);
    }
} else {
    // If required POST data is not set, handle accordingly
    echo "ข้อมูลไม่ครบถ้วน";
}
?>
