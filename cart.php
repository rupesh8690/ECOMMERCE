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
        .cart_image
        {
          width:100px;
          height:100px;
          object-fit:contain;

        }

        /* .background_image
        {
          background-image: url("image/nocart.jpg");
          background-size: cover;
          margin-bottom: 2em;
        } */
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
<!-- 
      <li class="nav-item">
        <a class="nav-link" href="./users_area/user_registration.php">Register</a>
      </li> -->

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

      <li class="nav-item">
        <!-- <a class="nav-link" href="users_area/userlogin.php">Login</a> -->
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

<!--creating cart table---->
<div class="container">
  <div class="row vh-100 ">
    <form action="" method="post">
  <table class="table  table-bordered text-center">
 

<!---php code begin--->
<?php
global $conn;
$get_ip_address= getIPAddress(); 
$total_price=0;
// Fetch the cart items for the given IP address
$cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result = mysqli_query($conn, $cart_query);


if(mysqli_num_rows($result)>0)
{
  echo "  <thead>
  <tr>
    <th scope='col'>Product Title</th>
    <th scope='col'>Product Image</th>
    <th scope='col'>Quantity</th>
    <th scope='col'>Total price</th>
    <th scope='col'>Remove</th>
    <th scope='col' colspan='2' class='text-center'>Operation</th>
  </tr>
</thead>
<tbody>";

while ($row = mysqli_fetch_array($result)) {

    $product_id = $row['product_id'];
    $select_product = "SELECT * FROM products WHERE product_id=$product_id";
    $result_product = mysqli_query($conn, $select_product);
    // $total=mysqli_num_rows($result_product);
  
     while($product_result=mysqli_fetch_assoc($result_product))
     {
         
         
         $product_title=$product_result['product_title'];
         $product_image=$product_result['product_image1'];
         $product_price=$product_result['product_price'];
         
         $product_price_array=array($product_result['product_price']);//[200,400]
         $product_values=array_sum($product_price_array);//[600]
         $total_price+=$product_values;//600

       
        
        ?>
        
         <tr>
         <th><?php echo $product_title ?></th>
         <td><img src='admin/product_images/<?php echo $product_image ?>' class='cart_image'></td>
         <td><input type='text' name='qty' class="form-input w-50"></td>
         <?php
            //working for update cart 
            if(isset($_POST['update_cart']))
            {
            
              $get_ip_address = getIPAddress(); 
              $quantities=$_POST['qty'];
              $update_cart_query="update `cart_details` set quantity=$quantities where ip_address='$get_ip_address' ";
              $myresult_cart= mysqli_query($conn, $update_cart_query);
              $total_price=$total_price*$quantities;

              if($myresult_cart)
              {
                echo "<script>alert('updated successfully')</script>";
              }
              else
              {
                echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";

              }

            }
            ?>
         <td><?php echo $product_price ?></td>
         <td><input type='checkbox' name='removeitem[]' value="<?php echo $product_id?>"> </td>
         <td><input type='submit' value='update cart' name='update_cart' class='bg-info px-3 py-2 border-0 mx-3' ></td>
         <td><input type='submit' value='Remove item' name='remove_cart' class='bg-info px-3 py-2 border-0 mx-3'></td>
       </tr>

      
       <?php
     }
    }
   
}
else
{
  
  // echo"<marquee>No cart is available </marquee> ";
  echo "<h2 class='text-center text-danger'> No cart is available </h2>";
}
?>
</tbody>
</table>

<div class="d-flex m-auto ">
<?php
global $conn;

$get_ip_address= getIPAddress(); 
// Fetch the cart items for the given IP address
$cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result = mysqli_query($conn, $cart_query);


if(mysqli_num_rows($result)>0)
{
  echo "  <h4 class='mt-2'>Sub Total : <strong class='text-info'> $total_price /-</strong></h4>
  <a href='index.php'class='bg-info px-3 border-0 mt-2 mb-2 text-dark text-decoration-none'>Continue shopping</a>
  <a href='./users_area/checkout.php' class='bg-secondary px-3 border-0 mt-2 mb-2 mx-2 text-dark text-decoration-none'>Checkout</a>";
}
else
{
  echo" <a href='index.php'class='bg-info px-3 border-0 mt-2 mb-2 text-dark text-decoration-none'>Continue shopping</a>";
}
?>
  

</div>
</form>
<!---function to remove items---->

<?php
function remove_Cart_Item()
{
global $conn;
if(isset($_POST['remove_cart']))
{
  foreach($_POST['removeitem'] as $remove_id){ //until and unless we have chek button clicked corresponding id will be fetched
    //$_post['removeitem'] will access the value and store its value in $remove_id
    //echo $remove_id;

    $delete_query="delete from `cart_details` where product_id=$remove_id";
    $run_delete=mysqli_query($conn,$delete_query);
    if($run_delete)
    {
      "<script>window.open('cart.php','_self')</script>";
      //if everything works then return to cart.php
    }


  }
}
}

echo $remove_item=remove_Cart_Item();
?>

  </div>
</div>





<!---cart table end here-->

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