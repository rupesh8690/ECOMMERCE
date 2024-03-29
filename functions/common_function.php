<?php

// include('./includes/connect.php');
error_reporting(0);
session_start();
//getting products

function getproducts()
{
  global $conn;

  //condtion to check isset or not

  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {

      //If both category of brand is not set then only display all the products
      $select_query = "SELECT * FROM `products` order by rand() limit 0,9"; //we want to display only 9 products in the home page
      $result_query = mysqli_query($conn, $select_query);
      while ($row_data = mysqli_fetch_assoc($result_query)) {

        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $product_price = $row_data['product_price'];
        $category_id = $row_data['category_id'];
        $brand_id = $row_data['brand_id'];
        $product_image1 = $row_data['product_image1'];
        $formattedPrice = number_format($product_price);
        echo " <div class='col-md-4'>'
 <!--first card--->
<div class='card mb-2 ' >
<img class='card-img-top img-fluid' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>price: $formattedPrice/-</p>
    <a href='index.php?cart_id=$product_id' class='btn text-white text-white' style='background-color:#F05941;'>Add to cart</a>
      <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
   </div>";


      }
    }

  }
}

//getting unique categories

function get_unique_categories()
{
  $category_id = $_GET['category'];
  global $conn;
  if (isset($_GET['category'])) {

    //If both category of brand is not set then only display all the products
    $select_query = "SELECT * FROM `products` where category_id=$category_id "; //we want to display only 9 products in the home page


    $result_query = mysqli_query($conn, $select_query);

    $num_of_rows = mysqli_num_rows($result_query); //getting total number of rows from the table

    if ($num_of_rows == 0) {

      echo "<div class='container text-center mt-5 vh-100 '>
  <h2 class='text-danger '>No products available for this category!</h2>
</div>
";

    } else {

      while ($row_data = mysqli_fetch_assoc($result_query)) {

        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $product_price = $row_data['product_price'];
        $category_id = $row_data['category_id'];
        $brand_id = $row_data['brand_id'];
        $product_image1 = $row_data['product_image1'];
        $formattedPrice = number_format($product_price);
        echo " <div class='col-md-4'>'
<!--first card--->
<div class='card mb-2'>
<img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price:$formattedPrice/-</p>
  <a href='index.php?cart_id=$product_id' class='btn  text-white' style='background-color:#F05941;'>Add to cart</a>

      <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    
</div>
</div>
 </div>";


      }
    }
  }
}

//getting unique brand
function get_unique_brand()
{
  $brand_id = $_GET['brand'];
  global $conn;
  if (isset($_GET['brand'])) {

    $select_query = "SELECT * FROM `products` where brand_id=$brand_id ";


    $result_query = mysqli_query($conn, $select_query);

    $num_of_rows = mysqli_num_rows($result_query); //getting total number of rows from the table

    if ($num_of_rows == 0) {

      echo "<div class='container text-center mt-5 vh-100'>
  <h2 class='text-danger'>This brand is not available for service!</h2>
</div>
";

    } else {

      while ($row_data = mysqli_fetch_assoc($result_query)) {

        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $product_price = $row_data['product_price'];
        $category_id = $row_data['category_id'];
        $brand_id = $row_data['brand_id'];
        $product_image1 = $row_data['product_image1'];
        $formattedPrice = number_format($product_price);
        echo " <div class='col-md-4'>'
<!--first card--->
<div class='card mb-2'>
<img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price:$formattedPrice /-</p>
  <a href='index.php?cart_id=$product_id' class='btn  text-white' style='background-color:#F05941;'>Add to cart</a>
  <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
 </div>";


      }
    }
  }
}

//getting all products
function get_all_products()
{

  global $conn;

  //condtion to check isset or not

  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {

      //If both category of brand is not set then only display all the products
      $select_query = "SELECT * FROM `products`"; //we want to display only 9 products in the home page
      $result_query = mysqli_query($conn, $select_query);
      while ($row_data = mysqli_fetch_assoc($result_query)) {

        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $product_price = $row_data['product_price'];
        $category_id = $row_data['category_id'];
        $brand_id = $row_data['brand_id'];
        $product_image1 = $row_data['product_image1'];
        $formattedPrice = number_format($product_price);
        echo " <div class='col-md-4'>'
<!--first card--->
<div class='card mb-2'>
<img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price:$formattedPrice/-</p>
  <a href='index.php?cart_id=$product_id' class='btn  text-white' style='background-color:#F05941;'>Add to cart</a>
      <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
 </div>";


      }
    }
  }

}


//getting products title
function getbrands()
{
  global $conn;
  $select_brands = "select *from brands";
  $result_brands = mysqli_query($conn, $select_brands);
  // $row_data=mysqli_fetch_assoc($result_brands);
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    echo " <li class='item '>
  <a href='index.php?brand=$brand_id' class='nav-item text-dark h6 text-justify'> $brand_title</a> </li>";
  }

}


//gettting categories

function getcategories()
{
  global $conn;
  $select_category = "select *from categories";
  $result_category = mysqli_query($conn, $select_category);
  // $row_data=mysqli_fetch_assoc($result_brands);
  while ($row_data = mysqli_fetch_assoc($result_category)) {
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    echo " <li class='item'>
      <a href='index.php?category=$category_id' class='nav-item text-dark h6 text-justify'> $category_title</a> </li>";
  }
}

//getting searched data

function search_product()
{
  global $conn;
  if (isset($_GET['search_data_product'])) //checking whether search buttone is set or not
  {
    $search_data_value = $_GET['search_data'];

    $search_query = "select * from `products` where product_keywords like '%$search_data_value%' "; //we are using % % to search the data from database wherever it is present at first or any otehr position

    $result_query = mysqli_query($conn, $search_query);
    $num_of_rows = mysqli_num_rows($result_query); //getting total number of rows from the table

    if ($num_of_rows == 0) {

      echo "<h2 class='text-danger text-center'> Sorry! this product is not available for service.</h2>";

    } else {
      while ($row_data = mysqli_fetch_assoc($result_query)) {

        $product_id = $row_data['product_id'];
        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $product_price = $row_data['product_price'];
        $category_id = $row_data['category_id'];
        $brand_id = $row_data['brand_id'];
        $product_image1 = $row_data['product_image1'];
        $formattedPrice = number_format($product_price);

        echo " <div class='col-md-4'>'
<!--first card--->
<div class='card mb-2'>
<img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price:$formattedPrice/-</p>
  <a href='index.php?cart_id=$product_id' class='btn  text-white' style='background-color:#F05941;'>Add to cart</a>
      <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
 </div>";

      }
    }
  }
}

//function for view more

function productbyproduct_id()
{


  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {
      if (isset($_GET['product_id'])) {

        global $conn;
        $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM `products`where product_id=$product_id";
        $result_query = mysqli_query($conn, $select_query);
        while ($row_data = mysqli_fetch_assoc($result_query)) {

          $product_id = $row_data['product_id'];
          $product_title = $row_data['product_title'];
          $product_description = $row_data['product_description'];
          $product_price = $row_data['product_price'];
          $category_id = $row_data['category_id'];
          $brand_id = $row_data['brand_id'];
          $product_image1 = $row_data['product_image1'];
          $product_image2 = $row_data['product_image2'];
          $product_image3 = $row_data['product_image3'];
          $formattedPrice = number_format($product_price);

          echo " <div class='col-md-4'>'
<!--first card--->
<div class='card mb-2'>
<img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price:$formattedPrice/-</p>
  <a href='index.php?cart_id=$product_id' class='btn  text-white' style='background-color:#F05941;'>Add to cart</a>
    <a href='index.php' class='btn btn-secondary'>Go back to home</a>
</div>
</div>
 </div>

 
 <div class='col-md-8  '>
  
 <div class='row'>
  <div class='col-md-12'>
  <h4 class='text-center  '>Related products</h4>
  </div>

 <div class='col-md-6'>
    <img class='card-img-top' src='./admin/product_images/$product_image2' alt='$product_title'>
 </div>

 <div class='col-md-6'>
 <img class='card-img-top' src='./admin/product_images/$product_image3' alt='$product_title'>

 </div>
</div>
</div>";


        }
      }
    }
  }


}



function userEmail()
{
      //accessing user's email
     
      global $conn;

      $user_name = $_SESSION['username'];
      $select_email_query = "SELECT user_email FROM user_table WHERE username='$user_name'";
      $result_email_query = mysqli_query($conn, $select_email_query);
      $row_email = mysqli_fetch_array($result_email_query);
      $user_email = $row_email['user_email'];
      
      return $user_email;
   

}
//cart function inserting to cart
function cart()
{
  if (isset($_GET['cart_id'])) {
    global $conn;
    $user_email=userEmail();
 
    $get_product_id = $_GET['cart_id'];

    $select_query = "SELECT * FROM `cart_details` WHERE user_email='$user_email' AND product_id=$get_product_id";

    $result_query = mysqli_query($conn, $select_query);


    $num_of_rows = mysqli_num_rows($result_query);

    if ($num_of_rows > 0) {
      echo "<script>alert('This item is already present inside the cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";

      // working with bootstrap toast


      //
    } else {
      $insert_query = "INSERT INTO `cart_details`(product_id,user_email,quantity) VALUES ($get_product_id,'$user_email',0)";
      $result_query = mysqli_query($conn, $insert_query);
      if ($result_query) {
        echo "<script>alert('Added to the cart..')</script>";

        echo "<script>window.open('index.php','_self')</script>";
      }


    }
  }

}



//function to get cart item number
function cart_item()
{
  //accessing user's email

  
  if (isset($_GET['cart_id'])) {
    global $conn;
    $user_email=userEmail();

    $get_product_id = $_GET['cart_id'];
  
    $select_query = " select * from `cart_details` where user_email='$user_email' ";
    $result_query = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);

  } else {
    global $conn;
    $user_email=userEmail();
   
    $select_query = " select * from `cart_details`  where user_email='$user_email' ";
    $result_query = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
}

//total price function

function total_cart_price()
{
  global $conn;
  $user_email=userEmail();


  global $total_price;
  $total_price = 0;


  // Fetch the cart items for the given IP address
  $cart_query = "SELECT * FROM `cart_details` WHERE user_email='$user_email'";
  $result = mysqli_query($conn, $cart_query);

  while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];


    // Fetch the product price from the products table
    $select_product = "SELECT * FROM products WHERE product_id=$product_id";
    $result_product = mysqli_query($conn, $select_product);

    while ($result_product_price = mysqli_fetch_array($result_product)) {
      $product_price = array($result_product_price['product_price']);
      $product_values = array_sum($product_price);
      $total_price += $product_values;

    }


    // if ($row_product_price = mysqli_fetch_array($result_product)) {
    //     // Add the product price to the total
    //     $product_price = $row_product_price['product_price'];
    //     $total_price += $product_price;
    // }
  }
  $formattedNumber = number_format($total_price);

  // Output the total cart price
  echo "Total Cart Price : Rs.   $formattedNumber ";
  return $total_price;
}


function get_user_order_detail()
{
  global $conn;
  /*$user_name = $_SESSION['username'];
$get_details = "SELECT * FROM user_table WHERE username=?";
$stmt = mysqli_prepare($conn, $get_details);
mysqli_stmt_bind_param($stmt, "s", $user_name);
mysqli_stmt_execute($stmt);
$result_query = mysqli_stmt_get_result($stmt);
 */
  $user_name = $_SESSION['username'];
  $get_details = "select *from user_table where username='$user_name'";
  $result_query = mysqli_query($conn, $get_details);
  while ($row = mysqli_fetch_array($result_query)) {
    $user_id = $row['user_id'];
    if (!isset($_GET['edit_account'])) {
      if (!isset($_GET['my_orders'])) {
        if (!isset($_GET['delete_account'])) {
          $get_orders = "select *from user_orders where 
          user_id=$user_id and order_status='pending'";
          $result_order_query = mysqli_query($conn, $get_orders);
          $row_count = mysqli_num_rows($result_order_query);
          if ($row_count > 0) {
            echo "<h3 class='text-center mt-4 '> You have <span class='text-danger'> $row_count </span> pending  orders  </h3>
            <p class='text-center '> <a href='profile.php?my_orders' class='text-dark text-decoration-none'> Order Details </a> </p>";
          } else {
            echo "<h3 class='text-center mt-4 '> You have <span class='text-danger'> $row_count </span> pending  orders  </h3>
            <p class='text-center '> <a href='index.php' class='text-dark text-decoration-none'> Explore the products </a> </p>";

          }

        }
      }

    }

  }

}

?>