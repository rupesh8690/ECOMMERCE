<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>



  <!---bootstrap css link --->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!--custom css--->
  <link rel="stylesheet" href="../styles.css">

  <!---font awesome--->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <style>
    .admin_image {
      width: 100px;
      object-fit: contain;
    }

    a:hover {
      background-color: #2980b9;
      color: #ffffff;
      padding: 10px;

    }

    .footer {
      position: relative;
      bottom: 0;
      right: 0;


    }

    body {
      overflow-x: hidden;

    }

    .custom-color {
      background-color: #F05941;

    }
  </style>
</head>

<body>

  </script>

  <div class="container-fluid p-0">

    <!--first child--->
    <nav class="navbar navbar-expand-lg navbar-light custom-color  ">
      <div class="container-fluid">
        <img src="../image/logo.png" alt="" class="logo">

        <nav class="navbar navbar-expand-lg ">
          <ul class="navbar-nav ">
            <li class="nav-item ">

              <!-- <a class="nav-link" href="">Welcome Guest</a> -->
              <?php
              if (!isset($_SESSION['admin_name'])) {
                echo "<a class='nav-link text-white' href=''>Welcome Guest</a> ";
              } else {

                echo "<a class='nav-link text-white' href=''>Welcome " . $_SESSION['admin_name'] . "</a> ";

              }

              ?>
            </li>
          </ul>

        </nav>
      </div>
    </nav>

    <!--Second child--->

    <div class="bg-light">
      <h3 class="text-center p-2">Manage Details </h3>
    </div>

    <!--creating navbr--->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <img src="../image/logo.png" alt="" class="logo">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-dark" href="insert_product.php">Insert Products <span
                class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?view_products">View products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?insert_category">Insert Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?view_category">View Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?insert_brands">Insert Brands</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?view_brands">View Brands</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?all_order">All orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?all_payment">All Payments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?list_users">List Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="logout.php">Logout</a>
          </li>


        </ul>

      </div>
    </nav>
    <!--navbar ended--->




    <!---fourth child ----->
    <div class="container vh-100 ">
      <?php

      if (isset($_GET['insert_category'])) {
        include('insert_categories.php');
      }

      if (isset($_GET['insert_brands'])) {
        include('insert_brands.php');
      }

      if (isset($_GET['view_products'])) {
        include('view_products.php');
      }

      if (isset($_GET['edit_products'])) {
        include('edit_products.php');
      }
      if (isset($_GET['view_category'])) {
        include('view_categories.php');
      }

      if (isset($_GET['view_brands'])) {
        include('view_brands.php');
      }

      if (isset($_GET['edit_category'])) {
        include('edit_category.php');
      }

      if (isset($_GET['edit_brands'])) {
        include('edit_brands.php');
      }

      if (isset($_GET['delete_brands'])) {
        include('delete_brand.php');
      }

      if (isset($_GET['delete_category'])) {
        include('delete_category.php');
      }


      if (isset($_GET['all_order'])) {
        include('all_order.php');
      }
      if (isset($_GET['delete_order'])) {
        include('delete_order.php');
      }

      if (isset($_GET['all_payment'])) {
        include('all_payment.php');
      }

      if (isset($_GET['delete_payment'])) {
        include('delete_payment.php');
      }
      if (isset($_GET['list_users'])) {
        include('list_users.php');
      }

      ?>



    </div>


    <!--including footer-->

    <?php

    include('../includes/footer.php');
    ?>
    <!-- <div class=" p-3 text-center footer w-100 ">
    <p>All rights are reserved © Designed and developed by Rupesh Thakur</p>
</div> -->



  </div>



  <!--bootstrap js link-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>