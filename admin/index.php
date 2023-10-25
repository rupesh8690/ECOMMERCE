<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!---bootstrap css link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!--custom css--->
    <link rel="stylesheet" href="../styles.css">

    <!---font awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .admin_image
        {
          width: 100px;
          object-fit: contain;
        }

   /* .footer
   {
    position:absolute;

  


   } */

   body
   {
    overflow-x:hidden;
   }

    </style>
</head>
<body>

  <div class="container-fluid p-0">

  <!--first child--->
  <nav class="navbar navbar-expand-lg navbar-light bg-info ">
    <div class="container-fluid">
    <img src="../image/logo.png" alt="" class="logo">

    <nav class="navbar navbar-expand-lg ">
    <ul class="navbar-nav ">
      <li class="nav-item ">
        <a class="nav-link" href="">Welcome Guest</a>
      </li>
    </ul>

    </nav>
    </div>
  </nav>

  <!--Second child--->

  <div class="bg-light">
    <h3 class="text-center p-2">Manage Details </h3>
  </div>


  <!--third child-->

  <div class="row">
  

    <div class="col-md-12 bg-secondary p-2 d-flex " >
        <div>
            <a href="#"> <img src="../image/apples.png" alt="" class="admin_image p-1"></a>
            <p class="text-light text-center">Admin name</p>
        </div>
       <!--button*10>a.nav-link.text-light.bg-info.my-1 --->
        <div class="button text-center ml-5 " >
            <button><a href="insert_product.php" class="nav-link text-light bg-info m-2 p-2">Insert Products</a></button>
            <button><a href="index.php?view_products" class="nav-link text-light bg-info m-2 p-2" >View Products</a></button>
            <button><a href="index.php?insert_category" class="nav-link text-light bg-info m-2 p-2">Insert Categories</a></button>
            <button><a href="index.php?view_category" class="nav-link text-light bg-info m-2 p-2">View Categories</a></button>
            <button><a href="index.php?insert_brands" class="nav-link text-light bg-info m-2 p-2">Insert Brands</a></button>
            <button><a href="index.php?view_brands" class="nav-link text-light bg-info m-2 p-2">View Brands</a></button>
            <button><a href="index.php?all_order" class="nav-link text-light bg-info m-2 p-2">All orders</a></button>
            <button><a href="index.php?all_payment" class="nav-link text-light bg-info m-2 p-2">All payments</a></button>
            <button><a href="index.php?list_users" class="nav-link text-light bg-info m-2 p-2">List users</a></button>
            <button><a href="" class="nav-link text-light bg-info m-2 p-2">Logout</a></button>
        </div>

    </div>
  </div>

  <!---fourth child ----->
  <div class="container ">
  <?php

  if(isset($_GET['insert_category']))
  {
    include('insert_categories.php');
  }

  if(isset($_GET['insert_brands']))
  {
    include('insert_brands.php');
  }

  if(isset($_GET['view_products']))
  {
    include('view_products.php');
  }

  if(isset($_GET['edit_products']))
  {
    include('edit_products.php');
  }
  if(isset($_GET['view_category']))
  {
    include('view_categories.php');
  }

  if(isset($_GET['view_brands']))
  {
    include('view_brands.php');
  }

  if(isset($_GET['edit_category']))
  {
    include('edit_category.php');
  }

  if(isset($_GET['edit_brands']))
  {
    include('edit_brands.php');
  }

  if(isset($_GET['delete_brands']))
  {
    include('delete_brand.php');
  }

  if(isset($_GET['delete_category']))
  {
    include('delete_category.php');
  }

  
  if(isset($_GET['all_order']))
  {
    include('all_order.php');
  }
  if(isset($_GET['delete_order']))
  {
   include('delete_order.php');
  }

  if(isset($_GET['all_payment']))
  {
   include('all_payment.php');
  }

  if(isset($_GET['delete_payment']))
  {
   include('delete_payment.php');
  }
  if(isset($_GET['list_users']))
  {
   include('list_users.php');
  }

   ?>



  </div>



  <div class="bg-info p-3 text-center footer ">
    <p>All rights are reserved © Designed and developed Rupesh Thakur</p>
</div>
  


  </div>



<!--bootstrap js link-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>