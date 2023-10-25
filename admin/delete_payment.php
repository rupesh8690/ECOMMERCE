<?php
include('../functions/common_function.php');
include('../includes/connect.php');

if(isset($_GET['delete_payment'])) {
    $payment_id = $_GET['delete_payment'];

  
  

    // Perform the deletion operation
    $delete_query = "DELETE FROM user_payments WHERE payment_id = ?";
    
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $payment_id);

    if ($stmt->execute()) {
        echo "<script>alert('Delete Successfully')</script>";
        echo "<script>window.open('./index.php?all_payment', '_self')</script>";
    } else {
        // Handle deletion failure
        echo "<script>alert('Delete failed')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }

    $stmt->close();
} 


?>