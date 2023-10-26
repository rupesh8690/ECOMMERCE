

<?php
include('../includes/connect.php'); 

if (isset($_POST['register'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $conf_admin_password = $_POST['conf_admin_password'];

    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);

      //checking whetheer user exist or not

      $select_query=" select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
      $result_retrieve_query=mysqli_query($conn,$select_query);
      $rows_count=mysqli_num_rows($result_retrieve_query);
      if($rows_count>0)
      {
          echo "<script>alert('Admin name and email  already Exist')</script>";
          echo "<script>window.open('admin_registration.php','_self')</script>";
  
      }
     
      elseif ($admin_password != $conf_admin_password) {
        echo "<script>alert('Password do not match!')</script>";
        echo "<script>window.open('admin_registration.php','_self')</script>";
    }
    
  
      else{

        $register_query = "INSERT INTO `admin_table`( `admin_name`, `admin_email`, `admin_password`) VALUES ('$admin_name','$admin_email','  $admin_password')";
            $result_query = mysqli_query($conn, $register_query);

            if ($result_query) {
                echo "<script>alert('Registered Successfully')</script>";
                echo "<script>window.open('admin_login.php', '_self')</script>";
                
            } else {
                echo "<script>alert('Admin not Registered ')</script>";
                echo "<script>window.open('admin_registered.php', '_self')</script>";
            }
        
       
        }
    }          
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Registration</title>

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
        </style>
    <!--bootstrap css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="row">
    <h2 class="text-center mt-3">Admin Registration</h2>
    <div class="col-md-6 mt-5 ">
        <img src="../image/register.jpg" alt="" class="register_image">
        
    </div>

    <div class="col-md-6 ">
    <form action="" method="post">
        <div class="container mt-5">

        <div class="mb-4">
                <label for="user_name" class="form-label mb-2">User name</label>
                <input type="text" class="form-control w-75" id="user_name" name="admin_name"
                 placeholder="Enter your username" autocomplete="off" required="required" >

            </div>

            <div class="mb-4">
                <label for="user_email" class="form-label mb-2 ">Email </label>
                <input type="email" class="form-control  w-75" id="user_email" name="admin_email" placeholder="Enter your email address" 
                autocomplete="off" required="required">
            </div>

            <div class="mb-4">
                <label for="user_password" class="form-label mb-2 ">Password</label>
                <input type="password" class="form-control w-75" id="user_password" placeholder="Password" name="admin_password" required="required">
            </div>

            <div class="mb-4">
                <label for="user_password" class="form-label mb-2 ">Confirm Password</label>
                <input type="password" class="form-control w-75" id="user_password" placeholder="Password" name="conf_admin_password" required="required">
            </div>

            <div class="mb-4">
                <input type="submit" value="Register" name="register" class="bg-info border-0 px-3 py-2 rounded ">
              
            </div>

            <div class="mb-4">
                <strong>Already have and account?</strong> <a href="admin_login.php" class=" text-danger font-weight-bold" >Login </a>
              
            </div>
        </div>
        </form>
    
    </div>
  
</div>
 

        <!--Bootstrap javascript link--->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
 
</html>