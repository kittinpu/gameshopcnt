<?php

    include "../connection/connectdb.php";

    $typeproduct_name = $_POST['typeproduct_name'];

    $sql_type = "INSERT INTO typeproduct (typeproduct_name,typeproduct_date) VALUES ('$typeproduct_name',NOW())";

    $result = mysqli_query($dbcon, $sql_type);
    if ($result) {
        //echo "บันทึกข้อมูลเรียบร้อย";
        header("Location: read_type");
    } else {
        echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
 
?>