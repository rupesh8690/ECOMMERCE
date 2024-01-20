<?php
include 'setting.php';
// Initialize variables
$total_price = '';
$product_ids = [];
$user_id=' ';

// Retrieve total_price from the URL
if (isset($_GET['total_price'])) {
    $total_price = $_GET['total_price'];
}

//acccessing user id
if(isset($_GET['user_id'])) {
$user_id= $_GET['user_id'];
}
// Access and encode array from the URL
if (isset($_GET['my_array'])) {
    $product_ids = $_GET['my_array'];
    $encoded_ids = http_build_query(['my_array' => $product_ids]);
}

// Construct the success URL with the encoded product IDs
$successurl = "http://localhost/ecommerce/ECOMMERCE/esewa_api/success.php?q=su&user_id=$user_id&$encoded_ids";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | Esewa</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <form id="myForm" action="<?php echo $epay_url ?>" method="post">
        <input value="<?php echo $total_price ?>" name="tAmt" type="hidden">
        <input value="<?php echo $total_price ?>" name="amt" type="hidden">
        <input value="0" name="txAmt" type="hidden">
        <input value="0" name="psc" type="hidden">
        <input value="0" name="pdc" type="hidden">
        <input value="<?php echo $merchant_code ?>" name="scd" type="hidden">
        <input value="<?php echo $pid ?>" name="pid" type="hidden">
        <input value="<?php echo $successurl ?>" type="hidden" name="su">
        <input value="<?php echo $failedurl ?>" type="hidden" name="fu">
    </form>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
        // Automatically submit the form when the page loads
        document.getElementById('myForm').submit();
    </script>
</body>

</html>