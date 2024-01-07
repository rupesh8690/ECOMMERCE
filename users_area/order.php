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
    //getting total item and total price of all items

    $get_ip_address = getIPAddress();
    $total_price = 0;
    $cart_query_price = "select * from cart_details where ip_address='$get_ip_address'";
    $result_cart_price = mysqli_query($conn, $cart_query_price);
    $count_products = mysqli_num_rows($result_cart_price);

    //generating random number for envoice

    $invoice_number = mt_rand();
    $status = "Pending";
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

//getting quantity from cart

$get_cart = "select *from cart_details";
$run_cart = mysqli_query($conn, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];
if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price;


} else {
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

//inserting data to users_table

$insert_orders = "INSERT INTO `user_orders` (`user_id`,`items_name`,`amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`)
                VALUES ($user_id,'$product_title', $subtotal, $invoice_number, $count_products, NOW(), '$status')";


$result_user_order = mysqli_query($conn, $insert_orders);
if ($result_user_order) {
    // echo"<script>alert('inserted successfully ". $get_ip_address ."')</script>"; 
    echo "<script>alert('inserted successfully')</script>";
    echo "<script>window.open('profile.php','_self') </script>";

} else {
    echo "<script>alert('Some problem occured ');</script>";
}

//inseting to orders pending

$insert_pending_order = "INSERT INTO `orders_pending`( `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) 
             values('$user_id','$invoice_number','$product_id','$quantity','$status')";
$result_pending_order = mysqli_query($conn, $insert_pending_order);


//once the data is inserted to orders pending table we have to delete the cart


$delete_cart_query = "DELETE FROM `cart_details` where ip_address='$get_ip_address'";
$result_cart_delete = mysqli_query($conn, $delete_cart_query);
if ($result_user_order) {
    // echo"<script>alert('inserted successfully ". $subtotal ."')</script>"; 
    echo "<script>alert('deleted successfully')</script>";
    echo "<script>window.open('profile.php','_self') </script>";

} else {
    echo "<script>alert('Some problem occured')</script>";
}


?>