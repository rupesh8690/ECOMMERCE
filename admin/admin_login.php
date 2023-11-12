<?php
include('../includes/connect.php'); 
session_start();

if(isset($_POST['admin_login']))
{
    $admin_name = trim($_POST['admin_name']);
    $admin_password = trim($_POST['admin_password']);
    
    $select_query="select * from `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($conn,$select_query);
    $row_count=mysqli_num_rows($result);

    $row_data=mysqli_fetch_assoc($result);// This is a PHP function used to fetch a row of data from a MySQL database result set as an associative array 
    if($row_count>0)
    {
        // if (password_verify($admin_password, $row_data['admin_password'])) {
            if($admin_password==$row_data['admin_password']){
            // Login successful
            $_SESSION['admin_name'] = $admin_name;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else
         {
            // Password does not match
            echo "<script>alert('Invalid credentials')</script>";
        }

    }
    
} 

    // else{
    //     echo "<script>alert('No user Exist! Register first to sign in')</script>";

    // }


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

    <!---css --->
    <style>
        body
        {
            overflow-x:hidden;
            overflow-y:hidden;
        }
        .register_image
        {
            width:100%;
            height:70%;
            object-fit:contain;
        }
        .eye-pasword
            {
                width:30px;
                height:30px;
            }
        </style>
    <!--bootstrap css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="row">
    <h2 class="text-center mt-3">Admin Login</h2>
    <div class="col-md-6 mt-5 ">
        <img src="../image/login.png" alt="" class="register_image">
        
    </div>

    <div class="col-md-6 ">
    <form action="" method="post">
    
        <div class="container mt-5">
       
        <div class="mb-4">
                <label for="admin_name" class="form-label mb-2">Admin name</label>
                <input type="text" class="form-control w-75"  name="admin_name"
                 placeholder="Enter your username" autocomplete="off" required="required" >

            </div>

        

            <div class="mb-4">
                <label for="admin_password" class="form-label mb-2 ">Password</label>
                <div class="d-flex align-items-center">
                <input type="password" class="form-control w-75 outline-0" id="admin_password" placeholder="Password" name="admin_password" required="required">
                <!-- <img src="../image/eye.svg" alt="image" class="eye-pasword " id="eyeicon"> -->
                </div>
            </div>

         

            <div class="mb-4">
                <input type="submit" value="Login" name="admin_login" class=" border-0 px-3 py-2 rounded text-white" style="background-color:#F05941;">
              
            </div>

            <div class="mb-4">
                <strong>Don't have an account?</strong> <a href="admin_registration.php" class=" text-danger font-weight-bold" >Register </a>
              
            </div>
         
        </div>
        </form>
    
    </div>

</div>

<!-- <script>
    let eyeicon = document.getElementById("eyeicon");
    let admin_password = document.getElementById("admin_password");

    eyeicon.onclick = function () {
        if (admin_password.type == "password") {
            admin_password.type = "text";
            eyeicon.src="../image/eye.png";
        } else {
            admin_password.type = "password";
            eyeicon.src="../image/eye.svg";
        }
    }
</script> -->
 

        <!--Bootstrap javascript link--->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
 
</html>