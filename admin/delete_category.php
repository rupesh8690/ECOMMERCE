<?php
include('../functions/common_function.php');
include('../includes/connect.php');

if (isset($_GET['delete_category'])) {
    $category_id = $_GET['delete_category'];
    echo $category_id;



    // Perform the deletion operation
    $delete_query = "DELETE FROM categories WHERE category_id = ?";

    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $category_id);

    if ($stmt->execute()) {
        echo "<script>alert('Delete Successfully')</script>";
        echo "<script>window.open('./index.php?view_category', '_self')</script>";
    } else {
        // Handle deletion failure
        echo "<script>alert('Delete failed')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }

    $stmt->close();
}


?>