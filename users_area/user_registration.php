<?php
include('../includes/connect.php'); 
include('../functions/common_function.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Registration</title>
        <!--bootstrap CSS Link --->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
 
   
</head>
<body>
    <div class="container-fluid my-3"><!--container fluid class will take 100% of width--->
    <h2 class="text-center ">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <!---"col-lg-12" specifies the column behavior for large (lg) screens. 
            It means that the element will occupy the full width of its parent container, taking up 12 grid columns out of 12 available columns in a row. In other words, it spans the entire width of the container on large screens.

          "col-xl-6" specifies the column behavior for extra-large (xl) screens. 
            In this case, the element will occupy half of the available width in its parent container, taking up 6 out of 12 grid columns in a row. On extra-large screens, it will take up half of the container's width.
           ---->

           <form action="" method="post" enctype="multipart/form-data">
            <!---"multipart/form-data" is typically used when you want to submit files (e.g., images, documents) along with other form data.--->
            <div class="mb-3">
                <label for="user_name" class="form-label">User name</label>
                <input type="text" class="form-control" id="user_name" name="user_name"
                 placeholder="Enter your username" autocomplete="off" required="required">

            </div>

            <div class="mb-3">
                <label for="user_email" class="form-label">Email </label>
                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter your email address" 
                autocomplete="off" required="required">
            </div>

            <div class="mb-3">
                <label for="user_image" class="form-label">User image</label>
                <input class="form-control   p-1 m-0" type="file" id="user_image" name="user_image">
            </div>

            <div class="mb-3">
                <label for="user_password">Password</label>
                <input type="password" class="form-control" id="user_password" placeholder="Password" name="user_password" required="required">
            </div>

            <div class="mb-3">
                <label for="user_password">Confirm Password</label>
                <input type="password" class="form-control" id="user_password" placeholder="Password" name="conf_user_password" required="required">
            </div>
            <div class="mb-3">
                <label for="user_address" class="form-label">Address </label>
                <input type="text" class="form-control" id="user_address" placeholder="Enter your email address" name="user_address"
                autocomplete="off" required="required">
            </div>

            <div class="mb-3 ">
                <label for="user_number" class="form-label">Contact</label>
                <input class="form-control   p-1 m-0" type="number" id="user_number" name="user_number" 
                placeholder="Enter your mobile number" required="required">
            </div>

            <div class="mt-4 pt-2 ">
                <input type="submit" value="Register" name="register" class="form-control bg-info mb-3 py-2  px-3  border-0">
                <p class="small fw-bolder mt-2 pt-2 mb-0">Already have an account? <a href="userlogin.php" class="text-decoration-none text-danger">Login</a></p>
            </div>

           </form>

        </div>

    </div>


    </div>
    
</body>
</html>

<?php
//php code for insertion



if(isset($_POST['register']))
{
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_temp=$_FILES['user_image']['temp_name'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_number=$_POST['user_number'];
    $user_ip=getIPAddress(); 

    //checking whetheer user exist or not

    $select_query=" select * from `user_table` where username='$user_name' or user_email='$user_email'";
    $result_retrieve_query=mysqli_query($conn,$select_query);
    $rows_count=mysqli_num_rows($result_retrieve_query);
    if($rows_count>0)
    {
        echo "<script>alert('Username and email  already Exist')</script>";
        echo "<script>window.open('user_registration.php','_self')</script>";

    }
    // else if($user_password != $conf_user_password)

    // {
    //     echo "<script>alert('Password doesn't matched!')</script>";
    //     echo "<script>window.open('user_registration.php','_self')</script>";
          
    // }
    elseif ($user_password != $conf_user_password)
{
    echo "<script>alert('Password do not match!')</script>"; //doesn't (apostrophe was not working)
    echo "<script>window.open('user_registration.php','_self')</script>";
}

    else{
            move_uploaded_file($user_image_temp,"user_images/$user_image");
            $register_query="insert into `user_table`( `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`)
            values('$user_name','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_number') ";
        
            $result_query=mysqli_query($conn,$register_query);
        
            if($result_query)
            {
                // echo "<script>alert('User Registered successfully " .  $rows_count_cart . "')</script>";

                // echo "<script>alert('User Registered successfully ')</script>";
        
                // echo "<script>window.open('userlogin.php','_self')</script>";//_self means we want to open in same tab
        
            }
            else{
                echo "<script>alert('Problem')</script>";
        
        
            }

          

    }
  
    //select cart items

    $select_cart_items="select *from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($conn,$select_cart_items);
    $rows_count_cart=mysqli_num_rows($result_cart);
    if($rows_count_cart>0)
    {
        $_SESSION['username']=$user_name;
        echo "<script>alert('You have items in your cart ')</script>";
        
        echo "<script>window.open('checkout.php','_self')</script>";//_self means we want to open in same tab

    }
    else
    {
        echo "<script>window.open('../index.php','_self')</script>";//_self means we want to open in same tab

    }



}


?>