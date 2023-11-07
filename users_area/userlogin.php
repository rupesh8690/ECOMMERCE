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
       <!---font awesome link for icon--->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!--bootstrap CSS Link --->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
         <!--custom css file link--->
       <link rel="stylesheet" href="../styles.css">
 <!--css code for hiding horizontal scroll bar--->
        <style>
            body
            {
                overflow-x:hidden;
            }
            .eye-pasword
            {
                width:30px;
                height:30px;
            }
        #user_password:focus {
        outline: none; /* Remove the focus outline (default browser behavior) */
        box-shadow: none; /* Remove any focus box shadow */
        border-color: initial; /* Reset the border color to its initial value */
    } 
    .passwordDiv:focus {
        border: 1px solid #007BFF;
    }
   
   


            </style>
   
</head>
<body >
      <!--Navbar-->
  <div class="container-fluid p-0">

<!--first child-->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
 <img src="../image/logo.png" alt="Ecommerce logo" class="logo"> 
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link " href="../index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link  " href="../display_all.php">Products</a>
    </li>

    <?php
    if(!isset($_SESSION['username']))
    {
      echo " <li class='nav-item'>
      <a class='nav-link ' href='../users_area/user_registration.php'>Register</a>
    </li>";
    }
    else
    {
     
      echo " <li class='nav-item'>
      <a class='nav-link ' href='../users_area/profile.php'>My Account</a>
    </li>";

    }


    ?>

   

    <li class="nav-item">
      <a class="nav-link" href="#">Contact</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_item(); ?></sup></a>
    </li>

    <li class="nav-item">
   
      <a class="nav-link" href="#"><?php total_cart_price() ?></a>
    </li>


  
  </ul>
  <form class="form-inline my-2 my-lg-0" action="../search_product.php" method="get">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
    <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
    <!-- <button class="btn btn-outline-light my-2 my-sm-0 " type="submit">Search</button> -->

  
  </form>
</div>
</nav>
<!--calling cart function--->
<?php
cart();
?>
<!--Second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav mr-auto">
<li class="nav-item">

    <?php
    if(!isset($_SESSION['username']))
    {
      echo "<a class='nav-link' href=''>Welcome Guest</a> ";
    }
    else
    {
     
      echo "<a class='nav-link' href=''>Welcome " .$_SESSION['username']."</a> ";

    }

    ?>
      
    </li>

    <li class="nav-item">
    <?php
    if(!isset($_SESSION['username']))
    {
      echo "   <li class='nav-item'>
      <a class='nav-link' href='users_area/userlogin.php'><i class='fa-solid fa-user '></i>    Login </a>
    </li> ";
    }
    else{
      echo "   <li class='nav-item'>
      <a class='nav-link' href='users_area/logout.php'>Logout</a>
    </li> ";

    }
    ?>
      
    </li>
</ul>
  

</nav>

<!--third child-->
<div class="bg-light">
  <h3 class="text-center">
      Hidden Store
  </h3>

  <p class="text-center">
      Communications is at the heart of e-commerce and community
  </p>
</div>
    <div class="container my-3 vh-100 "><!--container fluid class will take 100% of width--->
    <h2 class="text-center ">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6 ">
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
                <div class="d-flex align-items-center border ">
                <input type="password" class="form-control border-0 outline-0 " id="user_password" placeholder="Password" name="user_password" required="required">
                <img src="../image/eye.svg" alt="image" class="eye-pasword" id="eyeicon">

                </div>
            </div>

            
            <div class="mb-3">
                <a href="" class="text-info">Forgot password</a>
            </div>
           

            <div class="mt-4 pt-2 ">
                <input type="submit" value="Login" name="user_login" class="rounded bg-info mb-3 py-2  px-3  border-0">
                <p class="small fw-bolder mt-2 pt-2 mb-0"><strong>Don't have an account? </strong><a href="user_registration.php" class="text-decoration-none text-danger">Register</a></p>
            </div>

           </form>

        </div>

    </div>


    </div>
    <script>
    let eyeicon = document.getElementById("eyeicon");
    let user_password = document.getElementById("user_password");

    eyeicon.onclick = function () {
        if (user_password.type == "password") {
            user_password.type = "text";
            eyeicon.src="../image/eye.png";
        } else {
            user_password.type = "password";
            eyeicon.src="../image/eye.svg";
        }
    }
</script>

<!---includeing footer--->

<?php
include("../includes/footer.php");

?>

    
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