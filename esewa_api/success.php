<?php

include("../includes/connect.php");

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
if (isset($_GET['oid'])) {
    $order_id = $_GET['oid'];
}
if (isset($_GET['amt'])) {
    $amount = $_GET['amt'];
}

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

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



    //counting the number of products in cart
    $cart_query_price = "select * from cart_details where user_email='$user_email'";
    $result_cart_price = mysqli_query($conn, $cart_query_price);
    $count_products = mysqli_num_rows($result_cart_price);

    //inserting data to users_order
    $payment_mode = "eSewa";
    $insert_orders = "INSERT INTO `user_orders` (`order_id`,`user_id`,`items_name`,`amount_due`, `total_products`, `order_date`,`payment_mode`)
                VALUES ('$order_id',$user_id,'$product_title', $amount, $count_products, NOW(),'$payment_mode')";

    $result_user_order = mysqli_query($conn, $insert_orders);

    //if data submitted clear from the cart
    if($result_user_order)
    {
        $delete_cart_query = "DELETE FROM `cart_details` WHERE user_email='$user_email'";
        $result_cart_delete = mysqli_query($conn, $delete_cart_query);

    }


}


//inserting to the user_order

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>Esewa Payment</title>
</head>

<body>
    <div class="container mt-5">
        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">
            Payment Successful
            <button type="button" class="btn-close border-0 outline-0" data-bs-dismiss="alert"
                aria-label="Close">X</button>
        </div>
    </div>

    <div class="container">
        <table class="table">

            <tr>
                <th scope="col">User Id</th>
                <td>
                    <?php echo $user_id; ?>
                </td>
            </tr>


            <tr>
                <th scope="col">Items</th>
                <td>
                    <?php echo $product_title; ?>
                </td>


            </tr>
            <tr>
                <th scope="col">Order Id</th>
                <td>
                    <?php echo $order_id; ?>
                </td>

            </tr>
            <tr>
                <th scope="col">Amount Paid</th>
                <td>
                    <?php echo $amount; ?>
                </td>

            </tr>

        </table>
    </div>

    <div class="container">
        <a href="../index.php" style="   background-color: #F05941; " class="text-white p-2 rounded">Continue Shopping</a>
    </div>

    <!-- Bootstrap JS Bundle (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>