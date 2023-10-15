<?php
include('../functions/common_function.php');
include('../includes/connect.php');

if(isset($_GET['user_id']))
{
    $user_id=$_GET['user_id'];
    //getting total item and total price of all items

    $get_ip_address=getIPAddress();
    $total_price=0;
    $cart_query_price="select * from cart_details where ip_address='$get_ip_address'";
    $result_cart_price=mysqli_query($conn,$cart_query_price);
    $count_products=mysqli_num_rows($result_cart_price);

    //generating random number for envoice

    $invoice_number=mt_rand();
    $status="Pending";
    while($row_price=mysqli_fetch_array($result_cart_price))
    {
        $product_id=$row_price['product_id'];
        $select_products="select * from products where product_id=$product_id";
        $result_product=mysqli_query($conn,$select_products);
        while($row_product_price=mysqli_fetch_array($result_product))
        {
            $product_price=array($row_product_price['product_price']);
            $product_arry_amt=array_sum($product_price);
            $total_price+=$product_arry_amt;

        }


    }

 

}

//getting quantity from cart

$get_cart="select *from cart_details";
$run_cart=mysqli_query($conn,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0)
{
    $quantity=1;
    $subtotal=$product_price;


}

else
{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}

//inserting data to users_table

$insert_orders="insert into `user_orders`(`user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`)
                values($user_id,$subtotal,$invoice_number, $count_products,NOW(),'$status'";
                //order status is varchar so it is inclosed inside single quote
$result_user_order=mysqli_query($conn,$insert_orders);
if($result_user_order)
{
    echo"<script>alert('inserted successfully')</script>";

}
else
{
    echo"<script>alert('Some problem occured')</script>";
}



?>