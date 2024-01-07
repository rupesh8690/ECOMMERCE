<?php
include('../functions/common_function.php');
include('../includes/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!---custom css---->

    <link rel="stylesheet" type="text/css" href="./styles.css">
    <style>
        img {
            width: 50%;
            margin: auto;
            display: block;

        }
    </style>

    <title>Payment page</title>
</head>

<body>



    <!---php code to access user id--->

    <?php
    if (isset($_GET['total_price'])) {
        $total_price = $_GET['total_price'];
    }

    //accessing array from the url
    
    if (isset($_GET['my_array'])) {
        $product_ids = $_GET['my_array'];
    }

    $encoded_array = http_build_query(array('my_array' => $product_ids));

    // The http_build_query function in PHP is used to construct a URL-encoded query string from an array or an object.
    


    $user_ip = getIPAddress();
    $user_query = "select * from user_table where user_ip='$user_ip'";
    $result = mysqli_query($conn, $user_query);
    $run_query = mysqli_fetch_array($result); //both array and assoc are very similar but using array we can access by index like 1,2 and column name as well
    
    $user_id = $run_query['user_id'];



    ?>



    <div class="container">
        <h2 class="text-center " style="color:#F05941;">Payment Options</h2>

        <div class="container w-50 mt-4 text-center ">
            <select class="form-select p-2" id="paymentSelect" aria-label="Default select example">
                <option selected>Select Payment Options</option>
                <option value="1">Esewa</option>
                <option value="2">Khalti</option>
                <option value="3">Offline</option>
            </select>
        </div>

    </div>


    <!--Footer-->

    <!---includeing footer--->
    <script>
        // Get the select element by its ID
        var selectElement = document.getElementById('paymentSelect');

        // Add an event listener to the select element
        selectElement.addEventListener('change', function () {
            // Get the selected option's value
            var selectedOptionValue = selectElement.value;


            // Redirect the user to the appropriate page based on the selected option
            if (selectedOptionValue === '1') {
                var total_price = <?php echo json_encode($total_price) ?>;
                window.location.href = '/ecommerce/esewa_api/index.php?total_price= ' + total_price; // Replace with the actual URL
            } else if (selectedOptionValue === '2') {
                window.location.href = 'khalti-page.php'; // Replace with the actual URL
            } else if (selectedOptionValue === '3') {
                var user_id = <?php echo json_encode($user_id); ?>;
                window.location.href = 'order.php?user_id=' + user_id + '&' + '<?php echo $encoded_array; ?>';


            }
        });
    </script>

</body>

</html>