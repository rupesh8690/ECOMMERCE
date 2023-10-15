

<?php

// include('./includes/connect.php');
error_reporting(0);
//getting products

function getproducts()
{
    global $conn;

    //condtion to check isset or not

    if(!isset($_GET['category']))
    {
      if(!isset($_GET['brand']))
      {

        //If both category of brand is not set then only display all the products
$select_query="SELECT * FROM `products` order by rand() limit 0,9"; //we want to display only 9 products in the home page
$result_query=mysqli_query($conn,$select_query);
while($row_data=mysqli_fetch_assoc($result_query))
{

 $product_id=$row_data['product_id'];
 $product_title=$row_data['product_title'];
 $product_description=$row_data['product_description'];
 $product_price=$row_data['product_price'];
 $category_id=$row_data['category_id'];
 $brand_id=$row_data['brand_id'];
 $product_image1=$row_data['product_image1'];
 echo " <div class='col-md-4'>'
 <!--first card--->
<div class='card mb-2' style='width: 25rem;'>
<img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>price:$product_price/-</p>
    <a href='index.php?cart_id=$product_id' class='btn btn-info'>Add to cart</a>
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
  $category_id=$_GET['category'];
  global $conn;
  if(isset($_GET['category']))
  {
   
      //If both category of brand is not set then only display all the products
  $select_query="SELECT * FROM `products` where category_id=$category_id "; //we want to display only 9 products in the home page


$result_query=mysqli_query($conn,$select_query);

$num_of_rows=mysqli_num_rows($result_query);//getting total number of rows from the table

if($num_of_rows==0)
{
  
  echo "<h2 class='text-danger text-right'> No products available for this category </h2>";

}

else{

while($row_data=mysqli_fetch_assoc($result_query))
{

$product_id=$row_data['product_id'];
$product_title=$row_data['product_title'];
$product_description=$row_data['product_description'];
$product_price=$row_data['product_price'];
$category_id=$row_data['category_id'];
$brand_id=$row_data['brand_id'];
$product_image1=$row_data['product_image1'];
echo " <div class='col-md-4'>'
<!--first card--->
<div class='card mb-2' style='width: 25rem;'>
<img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price:$product_price/-</p>
  <a href='index.php?cart_id=$product_id' class='btn btn-info'>Add to cart</a>

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
  $brand_id=$_GET['brand'];
  global $conn;
  if(isset($_GET['brand']))
  {
   
  $select_query="SELECT * FROM `products` where brand_id=$brand_id ";


$result_query=mysqli_query($conn,$select_query);

$num_of_rows=mysqli_num_rows($result_query);//getting total number of rows from the table

if($num_of_rows==0)
{
  
  echo "<h2 class='text-danger text-right'> This brand is not available for service!</h2>";

}

else{

while($row_data=mysqli_fetch_assoc($result_query))
{

$product_id=$row_data['product_id'];
$product_title=$row_data['product_title'];
$product_description=$row_data['product_description'];
$product_price=$row_data['product_price'];
$category_id=$row_data['category_id'];
$brand_id=$row_data['brand_id'];
$product_image1=$row_data['product_image1'];
echo " <div class='col-md-4'>'
<!--first card--->
<div class='card mb-2' style='width: 25rem;'>
<img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price:$product_price/-</p>
  <a href='index.php?cart_id=$product_id' class='btn btn-info'>Add to cart</a>
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

  if(!isset($_GET['category']))
  {
    if(!isset($_GET['brand']))
    {

      //If both category of brand is not set then only display all the products
$select_query="SELECT * FROM `products`"; //we want to display only 9 products in the home page
$result_query=mysqli_query($conn,$select_query);
while($row_data=mysqli_fetch_assoc($result_query))
{

$product_id=$row_data['product_id'];
$product_title=$row_data['product_title'];
$product_description=$row_data['product_description'];
$product_price=$row_data['product_price'];
$category_id=$row_data['category_id'];
$brand_id=$row_data['brand_id'];
$product_image1=$row_data['product_image1'];
echo " <div class='col-md-4'>'
<!--first card--->
<div class='card mb-2' style='width: 25rem;'>
<img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price:$product_price/-</p>
  <a href='index.php?cart_id=$product_id' class='btn btn-info'>Add to cart</a>
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
    $select_brands="select *from brands";
$result_brands=mysqli_query($conn,$select_brands);
// $row_data=mysqli_fetch_assoc($result_brands);
while($row_data=mysqli_fetch_assoc($result_brands))
{
  $brand_title=$row_data['brand_title'];
  $brand_id=$row_data['brand_id'];
  echo " <li class='item'>
  <a href='index.php?brand=$brand_id' class='nav-item text-light text-justify'> $brand_title</a> </li>";
}

}


//gettting categories

function getcategories()
{
    global $conn;
    $select_category="select *from categories";
    $result_category=mysqli_query($conn,$select_category);
    // $row_data=mysqli_fetch_assoc($result_brands);
    while($row_data=mysqli_fetch_assoc($result_category))
    {
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo " <li class='item'>
      <a href='index.php?category=$category_id' class='nav-item text-light text-justify'> $category_title</a> </li>";
    }
}

//getting searched data

function search_product()
{
  global $conn;
if(isset($_GET['search_data_product']))//checking whether search buttone is set or not
{
  $search_data_value=$_GET['search_data'];

$search_query="select * from `products` where product_keywords like '%$search_data_value%' ";//we are using % % to search the data from database wherever it is present at first or any otehr position

$result_query=mysqli_query($conn,$search_query);
$num_of_rows=mysqli_num_rows($result_query);//getting total number of rows from the table

if($num_of_rows==0)
{
  
  echo "<h2 class='text-danger text-center'> Sorry! this product is not available for service.</h2>";

}
else
{
while($row_data=mysqli_fetch_assoc($result_query))
{

$product_id=$row_data['product_id'];
$product_title=$row_data['product_title'];
$product_description=$row_data['product_description'];
$product_price=$row_data['product_price'];
$category_id=$row_data['category_id'];
$brand_id=$row_data['brand_id'];
$product_image1=$row_data['product_image1'];
echo " <div class='col-md-4'>'
<!--first card--->
<div class='card mb-2' style='width: 25rem;'>
<img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price:$product_price/-</p>
  <a href='index.php?cart_id=$product_id' class='btn btn-info'>Add to cart</a>
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
 
  
  if(!isset($_GET['category']))
  {
    if(!isset($_GET['brand']))
    {
      if(isset($_GET['product_id']))
      {

        global $conn;
  $product_id=$_GET['product_id'];
  $select_query="SELECT * FROM `products`where product_id=$product_id"; 
$result_query=mysqli_query($conn,$select_query);
while($row_data=mysqli_fetch_assoc($result_query))
{

$product_id=$row_data['product_id'];
$product_title=$row_data['product_title'];
$product_description=$row_data['product_description'];
$product_price=$row_data['product_price'];
$category_id=$row_data['category_id'];
$brand_id=$row_data['brand_id'];
$product_image1=$row_data['product_image1'];
$product_image2=$row_data['product_image2'];
$product_image3=$row_data['product_image3'];

echo " <div class='col-md-4'>'
<!--first card--->
<div class='card mb-2' style='width: 25rem;'>
<img class='card-img-top' src='./admin/product_images/$product_image1' alt='$product_title'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_description</p>
  <p class='card-text'>price:$product_price/-</p>
  <a href='index.php?cart_id=$product_id' class='btn btn-info'>Add to cart</a>
    <a href='index.php' class='btn btn-secondary'>Go back to home</a>
</div>
</div>
 </div>

 
 <div class='col-md-8  '>
  
 <div class='row'>
  <div class='col-md-12'>
  <h4 class='text-center text-info '>Related products</h4>
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

//get ip address function

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

//cart function
function cart()
{
    if (isset($_GET['cart_id'])) {
        global $conn;
        $ip_address = getIPAddress();
        $get_product_id = $_GET['cart_id'];

        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip_address' AND product_id=$get_product_id";

        $result_query = mysqli_query($conn, $select_query);

        // if (!$result_query) {
        //     die("Error in query: " . mysqli_error($conn));
        // }

        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO `cart_details`(product_id, ip_address, quantity) VALUES ($get_product_id, '$ip_address', 0)";
            $result_query = mysqli_query($conn, $insert_query);

            // if (!$result_query) {
            //     die("Error in query: " . mysqli_error($conn));
            // }

            echo "<script>alert('Inserted successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


//function to get cart item number
function cart_item()
{
  if(isset($_GET['cart_id']))
  {
    global $conn;
    $get_product_id=$_GET['cart_id'];
    $get_ip_address = getIPAddress(); 
    $select_query=" select * from `cart_details` where ip_address='$get_ip_address' ";
    $result_query=mysqli_query($conn,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);

  }
    else{
      global $conn;
    $get_ip_address = getIPAddress(); 
    $select_query=" select * from `cart_details` where ip_address='$get_ip_address' ";
    $result_query=mysqli_query($conn,$select_query);
    $count_cart_items=mysqli_num_rows($result_query); 
    }
    echo $count_cart_items;
}

//total price function

function total_cart_price()
{
    global $conn;

    $get_ip_address = getIPAddress(); 
    global $total_price;
    $total_price=0;
 
    
    // Fetch the cart items for the given IP address
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
    $result = mysqli_query($conn, $cart_query);
    
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];

        
        // Fetch the product price from the products table
        $select_product = "SELECT * FROM products WHERE product_id=$product_id";
        $result_product = mysqli_query($conn, $select_product);

        while($result_product_price=mysqli_fetch_array($result_product))
        {
          $product_price=array($result_product_price['product_price']);
          $product_values=array_sum($product_price);
          $total_price+=$product_values;

        }
    
        
        // if ($row_product_price = mysqli_fetch_array($result_product)) {
        //     // Add the product price to the total
        //     $product_price = $row_product_price['product_price'];
        //     $total_price += $product_price;
        // }
    }

    // Output the total cart price
    echo "Total Cart Price: $total_price";
}



?>