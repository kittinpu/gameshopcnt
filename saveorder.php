<?php
require 'connection/connectdb.php';
session_start();

// Ensure error reporting does not include notices
error_reporting(E_ALL & ~E_NOTICE);

$user_id = $_SESSION['user_id'] ?? NULL;
$product_qty = $_POST["product_qty"] ?? NULL;
$total = $_POST['total'] ?? NULL;
$order_slip = 0;
$order_status = 0; // Make sure order_status is set to 0

if ($user_id === null || empty($_SESSION['shopping_cart'])) {
    echo "<script>
        alert('Invalid user or empty cart');
        window.location = 'index';
    </script>";
    exit();
}

// Begin transaction
mysqli_begin_transaction($dbcon);

try {
    // Insert into order table
    $stmt1 = $dbcon->prepare("INSERT INTO `order` (order_status, user_id, order_slip, order_datesave) VALUES (?, ?, ?, NOW())");
    if (!$stmt1) {
        throw new Exception("Prepare statement failed: " . $dbcon->error);
    }
    $stmt1->bind_param("iii", $order_status, $user_id, $order_slip);
    if (!$stmt1->execute()) {
        throw new Exception("Execute statement failed: " . $stmt1->error);
    }

    // Verify if order_status is correctly set
    if ($stmt1->affected_rows === 0) {
        throw new Exception("No rows affected, check order_status and bindings.");
    }

    // Get the last inserted order_id
    $order_id = $dbcon->insert_id;

    foreach ($_SESSION['shopping_cart'] as $product_id => $product_qty) {
        // Get product details
        $stmt2 = $dbcon->prepare("SELECT product_price FROM product WHERE product_id = ?");
        if (!$stmt2) {
            throw new Exception("Prepare statement failed: " . $dbcon->error);
        }
        $stmt2->bind_param("i", $product_id);
        if (!$stmt2->execute()) {
            throw new Exception("Execute statement failed: " . $stmt2->error);
        }
        $result = $stmt2->get_result();
        $product = $result->fetch_assoc();
        $total = $product['product_price'] * $product_qty;

        // Insert into orderdetail table
        $stmt3 = $dbcon->prepare("INSERT INTO orderdetail (order_id, product_id, product_qty, total) VALUES (?, ?, ?, ?)");
        if (!$stmt3) {
            throw new Exception("Prepare statement failed: " . $dbcon->error);
        }
        $stmt3->bind_param("iiid", $order_id, $product_id, $product_qty, $total);
        if (!$stmt3->execute()) {
            throw new Exception("Execute statement failed: " . $stmt3->error);
        }
    }

    // Commit transaction
    mysqli_commit($dbcon);
    $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
    
    // Clear the shopping cart session
    unset($_SESSION['shopping_cart']);
} catch (Exception $e) {
    // Rollback transaction if any query fails
    mysqli_rollback($dbcon);
    $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ. Error: " . $e->getMessage();
}

mysqli_close($dbcon);
?>

<script type="text/javascript">
    alert("<?php echo $msg; ?>");
    window.location = 'index';
</script>
