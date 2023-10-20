<!---connect file--->
<?php
include('functions/common_function.php');
include('includes/connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce webstie using PHP and MySQL</title>

    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
 
    
    <!---font awesome link for icon--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--custom css file link--->
       <link rel="stylesheet" href="styles.css">
       <style>
            body
            {
                overflow-x:hidden;
            }
            </style>

       
      
    
</head>
<body>
  <!--Navbar-->
  <div class="container-fluid p-0">

  <!--first child-->
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
   <img src="./image/logo.png" alt="Ecommerce logo" class="logo"> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display_all.php">Products</a>
      </li>

      <?php
      if(!isset($_SESSION['username']))
      {
        echo " <li class='nav-item'>
        <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
      </li>";
      }
      else
      {
       
        echo " <li class='nav-item'>
        <a class='nav-link' href='./users_area/profile.php'>My Account</a>
      </li>";

      }


      ?>

     

      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_item(); ?></sup></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#"><?php total_cart_price(); ?></a>
      </li>


    
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
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
        <a class='nav-link' href='users_area/userlogin.php'>Login</a>
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


<!--fouth class-->
<div class="row">
    <div class="col-md-10">
         <!--Products goes here-->
         <div class="row">
         <!--fetching products---->
         <?php

         getproducts();
         get_unique_categories();
         get_unique_brand();
        //  $ip = getIPAddress();  
        //  echo 'User Real IP Address - '.$ip;  
         ?>
       
           
           
         </div><!--row ending div--->

    </div><!---column ending div--->
   
  
    <!--side navbar-->
    <div class="col-md-2 bg-secondary p-0">
      <ul class="navbar-nav me-auto text-center">
        <li class="item bg-info">
          <a href="#" class="nav-item text-light text-justify"> <h4 class="text-center">Delivary Brands</h4></a>

        </li>

        <?php
        //setting data from categories and brand tables
        getbrands();
    
        ?>
        </ul>

        <!--categories--->

          <ul class="navbar-nav me-auto text-center">
        <li class="item bg-info">
          <a href="#" class="nav-item text-light text-justify"> <h4 class="text-center">Categories</h4></a>
        </li>

        <?php
        //setting data from categories and brand tables
        getcategories();
      
      
        ?>
      </ul>
      
</div>
 
</div>




<!--Footer-->

<!---includeing footer--->

<?php
include("./includes/footer.php");

?>
  </div>




    <!--Bootstrap javascript link--->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>