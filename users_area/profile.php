<!---connect file--->
<?php
include('../functions/common_function.php');
include('../includes/connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>

    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
 
    
    <!---font awesome link for icon--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--custom css file link--->
       <link rel="stylesheet" href="../styles.css">
    
    <style>
.profile_img
{
    width: 90%;
    height:100%;
    margin:auto; 
    display:block;
    object-fit:contain;



}

body
{
    overflow-x:hidden;}
        
      </style>
      
    
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

      
      <?php
      if(!isset($_SESSION['username']))
      {
        echo " <li class='nav-item'>
        <a class='nav-link' href='user_registration.php'>Register</a>
      </li>";
      }
      else
      {
       
        echo " <li class='nav-item'>
        <a class='nav-link' href='profile.php'>My Account</a>
      </li>";

      }


      ?>

      <!-- <li class="nav-item">
        <a class="nav-link" href="user_registration.php">Register</a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_item(); ?></sup></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#"><?php total_cart_price(); ?></a>
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
        <a class='nav-link' href='userlogin.php'>Login</a>
      </li> ";
      }
      else{
        echo "   <li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a>
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


<!---fourth child---->


<div class="row">
  <div class="col-md-2 ">
  <ul class="navbar-nav mb-1 text-center bg-secondary" style="height:100vh">
        <li class="item bg-info">
          <a href="#" class="nav-item text-light text-decoration-none "> <h4 class="text-center">Your  Profile</h4></a>
        </li>
        <?php
  
  

        $user_name=$_SESSION['username'];
      
        $select_query="select *from user_table where username='$user_name'";
        $data=mysqli_query($conn,$select_query);
        $row=mysqli_fetch_array($data);
         $user_image=$row['user_image'];
         echo "  <li class='item '>
       
         <img src='./user_images/$user_image' alt='user' class='profile_img my-4 m'>
  
        </li> ";

       
        
        ?>
    

    

       

        <li class="item ">
          <a href="profile.php" class="nav-item text-light text-decoration-none"> Pending Orders</a>
        </li>

        <li class="item ">
          <a href="profile.php?edit_account" class="nav-item text-light text-decoration-none"> Edit Account</a>
        </li>
        <!-- <li class="item ">
          <a href="#" class="nav-item text-light text-decoration-none"> <?php echo $user_name ?></a>
        </li> -->

        <li class="item ">
          <a href="profile.php?my_orders" class="nav-item text-light text-center text-decoration-none"> My orders</a>
        </li>

        <li class="item ">
          <a href="profile.php?delete_account" class="nav-item text-light text-decoration-none"> Delete Account</a>
        </li>

      

        <li class="item ">
          <a href="logout.php" class="nav-item text-light text-decoration-none"> Logout</a>
        </li>
    </ul>
      
  </div>

  <div class="col-md-10 text-center">
    <?php
    get_user_order_detail();
    if(isset($_GET['edit_account']))
    {
      include('edit_account.php');
    }
    if(isset($_GET['my_orders']))
    {
      include('my_orders.php');
    }
    if(isset($_GET['delete_account']))
    {
      include('delete_account.php');
    }

    ?>

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