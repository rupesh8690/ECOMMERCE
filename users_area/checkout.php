<!---connect file--->
<?php
include('../includes/connect.php');
@session_start(); //@means if the page is active then only session is started

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce webstie-Checkout page</title>

    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
 
    
    <!---font awesome link for icon--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--custom css file link--->
       <link rel="stylesheet" href="../styles.css">
      
    
</head>
<body>
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
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../display_all.php">Products</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="user_registration.php">Register</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    
    </ul>
  </div>
</nav>

<!--Second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav mr-auto">
<li class="nav-item">
        <!-- <a class="nav-link" href="#">Welcome Guest</a> -->
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

      <?php
      if(!isset($_SESSION['username']))
      {
        echo "   <li class='nav-item'>
        <a class='nav-link' href='userlogin.php'>Login</a>
      </li> ";
      }
      else{
        echo "   <li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a>
      </li> ";

      }


      ?>

   
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


<div class="row px-1">
    <div class="col-md-12">
        <div class="row">
            <?php
            if(!isset($_SESSION['username']))
            {
                include('userlogin.php');

            }
            else
            {
                include('payment.php');
            }
            ?>
        </div>
    </div>

</div>




<!--Footer-->

<!---includeing footer--->

<?php
include("../includes/footer.php");

?>
  </div>




    <!--Bootstrap javascript link--->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>