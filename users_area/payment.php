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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

        <!---custom css---->

        <link rel="stylesheet" type="text/css" href="./styles.css">
        <style>
          img 
          {
            width :50%;
            margin:auto;
            display:block;

          }



        </style>
    
    <title>Payment page</title>
</head>
<body>

 

<!---php code to access user id--->

<?php
$user_ip=getIPAddress();
$user_query="select * from user_table where user_ip='$user_ip'";
$result=mysqli_query($conn,$user_query);
$run_query=mysqli_fetch_array($result);//both array and assoc are very similar but using array we can access by index like 1,2 and column name as well

$user_id=$run_query['user_id'];


?>
    <div class="container">
        <h2 class="text-center text-info">Payment option</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
            <a href="https://www.esewa.com.np" target="_blank"> <img src="../image/esewa.png"></a>
            <!--target attribute is used to open in new tab--->

            </div>

            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>"> <h2 class="text-center">Pay offline</h2></a>

            <!--target attribute is used to open in new tab--->

            </div>
           
        </div>
    </div>

    <!--Footer-->

<!---includeing footer--->


</body>
</html>