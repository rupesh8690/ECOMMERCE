<?php
include('../functions/common_function.php');
include('../includes/connect.php');

if (isset($_GET['order_id'])) {
    global $conn;
    $order_id = $_GET['order_id'];
    $select_query = "select *from `user_orders`  where order_id=$order_id";
    $data = mysqli_query($conn, $select_query);
    $row_fetch = mysqli_fetch_array($data);



    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];



}


//inserting to payment page



if (isset($_POST['confirm_payment'])) {
    if (isset($_POST['payment_mode'])) {
        $payment_mode = $_POST['payment_mode'];
        $insert_query = "INSERT INTO `user_payments` (`order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) 
                        VALUES ('$order_id', '$invoice_number', '$amount_due', '$payment_mode', NOW())";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('Payment inserted successfully')</script>";
            echo "<script>window.open('profile.php?','_self')</script>";
        } else {
            echo "<script>alert('Failed to insert payment')</script>";
        }
    } else {
        echo "<script>alert('Please select a payment method')</script>";
    }

    $update_orders = "update user_orders set order_status='Complete' where order_id=$order_id";
    $result_orders = mysqli_query($conn, $update_orders);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Payment page</title>
</head>

<body class="bg-secondary">

    <div class="container w-50 d-flex align-items-center justify-content-center  my-3 ">
        <form action="" method="post" onsubmit="return validateForm();">
            <h4 class="text-center text-white mt-4">Confirm Payment</h4>

            <div class="form-outline my-4 w-auto">
                <input type="text" class="form-control " name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>

            <div class="form-outline my-4 w-auto ">
                <label for="amount" class="text-light">Amount</label>
                <input type="text" class="form-control " name="amount" value="<?php echo $amount_due ?>">
            </div>

            <select id="payment_mode" name="payment_mode" class="form-select py-2 px-3">
                <option value="">Select payment method</option>
                <option value="Cash on delivery">Cash on delivery</option>
                <option value="Phone pay">Phone pay</option>
                <option value="Esewa">Esewa</option>
                <option value="Khalti">Khalti</option>
            </select>



            <div class="form-outline my-4 text-center w-50 m-auto ">
                <input type="submit" value="Confirm" class="bg-info border-0 px-3 py-2" name="confirm_payment">
            </div>


        </form>


    </div>

    <!-- JavaScript to validate the form -->
    <script>
        function validateForm() {
            var paymentMode = document.querySelector('select[name="payment_mode"]').value;
            if (paymentMode === "") {
                alert('Please select a payment method');
                return false; // Prevent form submission
            }
            return true; // Allow form submission if a payment method is selected
        }
    </script>
    <!--Bootstrap javascript link--->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</body>

</html>