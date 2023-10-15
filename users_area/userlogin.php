<?php
include('../includes/connect.php'); 
include('../functions/common_function.php');
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Login</title>
        <!--bootstrap CSS Link --->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
 <!--css code for hiding horizontal scroll bar--->
        <style>
            body
            {
                overflow-x:hidden;
            }
            </style>
   
</head>
<body>
    <div class="container-fluid my-3"><!--container fluid class will take 100% of width--->
    <h2 class="text-center ">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <!---"col-lg-12" specifies the column behavior for large (lg) screens. 
            It means that the element will occupy the full width of its parent container, taking up 12 grid columns out of 12 available columns in a row. In other words, it spans the entire width of the container on large screens.

          "col-xl-6" specifies the column behavior for extra-large (xl) screens. 
            In this case, the element will occupy half of the available width in its parent container, taking up 6 out of 12 grid columns in a row. On extra-large screens, it will take up half of the container's width.
           ---->

           <form action="" method="post" >
            <!---"multipart/form-data" is typically used when you want to submit files (e.g., images, documents) along with other form data.--->
            <div class="mb-3">
                <label for="user_name" class="form-label">User name</label>
                <input type="text" class="form-control" id="user_name" name="user_name"
                 placeholder="Enter your username" autocomplete="off" required="required">

            </div>

            <div class="mb-3">
                <label for="user_password">Password</label>
                <input type="password" class="form-control" id="user_password" placeholder="Password" name="user_password" required="required">
            </div>

            
            <div class="mb-3">
                <a href="" class="text-info">Forgot password</a>
            </div>
           

            <div class="mt-4 pt-2 ">
                <input type="submit" value="Login" name="user_login" class="rounded bg-info mb-3 py-2  px-3  border-0">
                <p class="small fw-bolder mt-2 pt-2 mb-0">Don't have an account? <a href="user_registration.php" class="text-decoration-none text-danger">Register</a></p>
            </div>

           </form>

        </div>

    </div>


    </div>
    
</body>
</html>

<?php
if(isset($_POST['user_login']))
{
    $user_name=$_POST['user_name'];
    $user_password=$_POST['user_password'];
    $select_query="select * from `user_table` where username='$user_name'";
    $result=mysqli_query($conn,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);// This is a PHP function used to fetch a row of data from a MySQL database result set as an associative array

   // cart item
    $user_ip=getIPAddress(); 

    $select_query_cart="select *from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($conn,$select_query_cart);
    $row_count_cart=mysqli_num_rows($result_cart);

    if($row_count>0)
    {
        $_SESSION['username']=$user_name; //creating session variable accecing the user name and storing inside the session variable
        if(password_verify($user_password,$row_data['user_password'])) //unshasing the password and verifying
        {
            // echo "<script>alert('Login successfull ".$user_ip ."')</script>";
            if($row_count==1 and $row_count_cart==0)
            {
                $_SESSION['username']=$user_name;
                echo "<script>alert('Login successfull')</script>";
                echo "<script>window.open('profile.php','_self') </script>";


            }

            else{
                $_SESSION['username']=$user_name;
                echo "<script>alert('Login successfull')</script>";
                echo "<script>window.open('payment.php','_self') </script>";
            }

        }
        else{
            echo "<script>alert('invalid credential')</script>";
        }

    }
    else{
        echo "<script>alert('invalid credential')</script>";
    
    }

}

?>