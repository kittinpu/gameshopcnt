<?php

    include "../connection/connectdb.php";

    $typeproduct_id = $_POST['typeproduct_id'];
    $typeproduct_name = $_POST['typeproduct_name'];
    
    $sql_type = "UPDATE typeproduct SET typeproduct_name='$typeproduct_name',typeproduct_date=NOW() WHERE typeproduct_id='$typeproduct_id'";

    $result_type = mysqli_query($dbcon, $sql_type);
    if ($result_type) {
        //echo "บันทึกข้อมูลเรียบร้อย";
        header("Location: read_type");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
 
?>