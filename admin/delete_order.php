<?php
include('../functions/common_function.php');
include('../includes/connect.php');

if (isset($_GET['delete_order'])) {
    $order_id = $_GET['delete_order'];
    // Perform the deletion operation
    $delete_query = "DELETE FROM user_orders WHERE order_id = ?";

    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $order_id);

    //"i" is a format specifier indicating that the variable
    // $brand_id should be treated as an integer when binding it as a parameter to the prepared statement

    if ($stmt->execute()) {
        echo "<script>alert('Delete Successfully')</script>";
        echo "<script>window.open('./index.php?all_order', '_self')</script>";
    } else {
        // Handle deletion failure
        echo "<script>alert('Delete failed')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }

    $stmt->close();
}


?>