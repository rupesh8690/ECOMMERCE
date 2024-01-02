<?php
include('../functions/common_function.php');
include('../includes/connect.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Perform the deletion operation
    $delete_query = "DELETE FROM products WHERE product_id = $product_id";
    $result_delete = mysqli_query($conn, $delete_query);

    if ($result_delete) {
        echo "<script>alert('Delete Successfully')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    } else {
        // Handle deletion failure
        echo "<script>alert('Delete failed')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }
}
?>



?>