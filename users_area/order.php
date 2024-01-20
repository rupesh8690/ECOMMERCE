<?php
include('../functions/common_function.php');
include('../includes/connect.php');


if (isset($_GET['my_array'])) {
    $product_title = " ";
    $product_ids = $_GET['my_array'];
    foreach ($product_ids as $value) {
        $select_product_query = "select product_title from products where product_id=$value";
        $result_product_query = mysqli_query($conn, $select_product_query);
        $row = mysqli_fetch_array($result_product_query);
        // Concatenate product titles
        $product_title .= $row["product_title"] . "/ ";

    }
}



if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $total_price = 0;

    global $conn;


    //getting email on the basis of user id
    $select_email_query = "select user_email from user_table where user_id=$user_id limit 1 ";
    $result_email_query = mysqli_query($conn, $select_email_query);
    if ($result_email_query) {
        $user_data = mysqli_fetch_assoc($result_email_query);
        $user_email = $user_data['user_email'];

    } else {
        // Handle the case where the query fails
        echo "Query error: " . mysqli_error($conn);
    }



    $cart_query_price = "select * from cart_details where user_email='$user_email'";
    $result_cart_price = mysqli_query($conn, $cart_query_price);
    $count_products = mysqli_num_rows($result_cart_price);



    

   
    while ($row_price = mysqli_fetch_array($result_cart_price)) {
        $product_id = $row_price['product_id'];
        $select_products = "select * from products where product_id=$product_id";
        $result_product = mysqli_query($conn, $select_products);
        // $product_price=$row_price['prodcut_price'];
        while ($row_product_price = mysqli_fetch_array($result_product)) {
            $product_price_arr = array($row_product_price['product_price']);
            $product_arry_amt = array_sum($product_price_arr);
            $total_price += $product_arry_amt;

        }


    }



}





//inserting data to users_table
$payment_mode="Cash on Delivery";
$order_id="COD" . uniqid();//uniqid function to generate a unique identifier and concatenate with MS
$insert_orders = "INSERT INTO `user_orders` (`order_id`,`user_id`,`items_name`,`amount_due`, `total_products`, `order_date`,`payment_mode`)
                VALUES ('$order_id',$user_id,'$product_title', $total_price,  $count_products, NOW(),'$payment_mode')";

$result_user_order = mysqli_query($conn, $insert_orders);

if ($result_user_order) {
    echo "<script>alert('inserted successfully')</script>";
    echo "<script>window.open('profile.php','_self') </script>";

    $delete_cart_query = "DELETE FROM `cart_details` WHERE user_email='$user_email'";
    $result_cart_delete = mysqli_query($conn, $delete_cart_query);

    if ($result_cart_delete) {
        echo "<script>alert('deleted successfully')</script>";
        echo "<script>window.open('profile.php','_self') </script>";
    } else {
        echo "<script>alert('Some problem occurred during deletion')</script>";
    }
} else {
    echo "<script>alert('Some problem occurred during insertion')</script>";
}

?>