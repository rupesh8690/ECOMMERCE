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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



  <!---font awesome link for icon--->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--custom css file link--->
  <link rel="stylesheet" href="styles.css">

  <style>
    .cart_image {
      width: 100px;
      height: 100px;
      object-fit: contain;

    }

    .custom-color {
      background-color: #F05941;

    }

    .second-nav-bg {
      background-color: #A9A9A9;
    }

    .nav-link {
      font-size: 1.2rem;
      font-family: sans-serif;
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

  <!-- javascript to calculate total cost on the basis of quantitiy -->


  <!--Navbar-->
  <div class="container-fluid p-0">

    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light custom-color fixed-top ">
      <img src="./image/logo.png" alt="Ecommerce logo" class="logo">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="display_all.php">Products</a>
          </li>
          <?php
          if (!isset($_SESSION['username'])) {
            echo " <li class='nav-item'>
        <a class='nav-link text-white' href='./users_area/user_registration.php'>Register</a>
      </li>";
          } else {

            echo " <li class='nav-item'>
        <a class='nav-link text-white' href='./users_area/profile.php'>My Account</a>
      </li>";

          }


          ?>
          <!-- 
      <li class="nav-item">
        <a class="nav-link" href="./users_area/user_registration.php">Register</a>
      </li> -->

          <li class="nav-item">
            <a class="nav-link text-white" href="contact.php">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup>
                <?php cart_item(); ?>
              </sup></a>
          </li>



          <li class="nav-item">
            <a class="nav-link text-white" href="#">
              <p class="total-nav">
                <?php total_cart_price(); ?>
              </p>
            </a>
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
    <nav class="navbar navbar-expand-lg navbar-dark second-nav-bg" style="margin-top: 86px;">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <!-- <a class="nav-link" href="#">Welcome Guest</a> -->
          <?php
          if (!isset($_SESSION['username'])) {
            echo "<a class='nav-link text-dark' href=''>Welcome Guest</a> ";
          } else {

            echo "<a class='nav-link text-dark' href=''>Welcome " . $_SESSION['username'] . "</a> ";

          }

          ?>
        </li>

        <li class="nav-item">
          <!-- <a class="nav-link" href="users_area/userlogin.php">Login</a> -->
          <?php
          if (!isset($_SESSION['username'])) {
            echo "   <li class='nav-item'>
        <a class='nav-link text-dark' href='users_area/userlogin.php'><i class='fa-solid fa-user '></i> Login</a>
      </li> ";
          } else {
            echo "   <li class='nav-item'>
        <a class='nav-link text-dark' href='users_area/logout.php'>Logout</a>
      </li> ";

          }
          ?>
        </li>
      </ul>


    </nav>

    <!--third child-->
    <div class="bg-light">
      <h3 class="text-center">
        Mithila Store
      </h3>

      <p class="text-center">
        Shop the latest trends and discover quality products at Mithila Store
      </p>
    </div>

    <!--creating cart table---->
    <div class="container mt-5 d-flex align-items-center justify-content-center">
      <div class="row vh-100 ">
        <form action="" method="post">
          <table class="table  table-bordered text-center">


            <!---php code begin--->
            <!-- ... Existing PHP code ... -->

            <?php
            // creating an empty array
            $product_ids = array();
            $product_prices = array();
            global $conn;

            $total_price = 0;

            // getting user's email
            $user_email = userEmail();
            // Fetch the cart items for the given IP address
            $cart_query = "SELECT * FROM `cart_details` WHERE user_email='$user_email'";
            $result = mysqli_query($conn, $cart_query);

            if (mysqli_num_rows($result) > 0) {
              echo "<thead>
    <tr>
        <th scope='col'>Product Title</th>
        <th scope='col'>Product Image</th>
        <th scope='col'>Unit Price</th>
        <th scope='col'>Quantity</th>
        <th scope='col'>Total Amount</th>
        <th scope='col'>Remove</th>
        <th scope='col'>Operation</th>
    </tr>
</thead>
<tbody>";

              while ($row = mysqli_fetch_array($result)) {



                $total_amount_default = $product_result['product_price']; // Set default total amount to unit price
                $product_id = $row["product_id"];
                $select_product = "SELECT * FROM products WHERE product_id=$product_id";
                $result_product = mysqli_query($conn, $select_product);

                while ($product_result = mysqli_fetch_assoc($result_product)) {

                  $default_quantity = 1;
                  $total_amount_default = $product_result['product_price'] * $default_quantity; // Set default total amount to unit price * quantity
            
                  $product_title = $product_result['product_title'];
                  $product_image = $product_result['product_image1'];

                  $product_price = $product_result['product_price'];
                  array_push($product_prices, $product_price);

                  $product_id = $product_result['product_id'];
                  array_push($product_ids, $product_id);

                  $product_price_array = array($product_result['product_price']);
                  $product_values = array_sum($product_price_array);
                  $total_price += $product_values;

                  ?>
                  <tr>
                    <th>
                      <?php echo $product_title ?>
                    </th>
                    <td><img src='admin/product_images/<?php echo $product_image ?>' class='cart_image'></td>

                    <?php
                    $formatted_price = number_format($product_price);
                    $formatted_total_price = number_format($total_price);
                    ?>

                    <td>
                      <?php echo $formatted_price; ?>
                    </td>
                    <td>
                      <?php echo "<input type='number' min=1 class='qty-input text-center' value='$default_quantity'>"; ?>
                    </td>
                    <td>
                      <?php echo "<input type='text' class='total-price-input' value='$total_amount_default' readonly disabled>"; ?>


                    </td>

                    <td><input type='checkbox' name='removeitem[]' value="<?php echo $product_id ?>"> </td>
                    <td><input type='submit' value='Remove item' name='remove_cart'
                        class='text-white px-3 py-2 border-0 mx-3 rounded' style='background-color:#F05941;'></td>
                  </tr>
                  <?php
                }
              }

              $encoded_prices = json_encode($product_prices);
            } else {
              echo "<h2 class='text-center text-danger'> No cart is available </h2>";
            }
            ?>
            </tbody>
          </table>

          <div class="d-flex m-auto ">
            <?php
            $encoded_array = http_build_query(array('my_array' => $product_ids));
            global $conn;
            $user_email = userEmail();

            $cart_query = "SELECT * FROM `cart_details` WHERE user_email='$user_email'";
            $result = mysqli_query($conn, $cart_query);

            if (mysqli_num_rows($result) > 0) {
              echo "  <h4 class='mt-2'>Sub Total : <strong class='text-dark totalPrice ' >  $formatted_total_price /-</strong></h4>
            <a href='index.php'class=' px-3 border-0 mt-2 mb-2 text-white text-decoration-none rounded-top rounded-bottom' style='background-color:#F05941;'>Continue shopping</a>
           <a href='./users_area/checkout.php?total_price=$total_price&$encoded_array ' class=' px-3 border-0 mt-2 mb-2 mx-2 text-dark text-decoration-none rounded-top rounded-bottom' style='background-color:#A9A9A9;'>Checkout</a>";
          //  <a href='#' class='px-3 border-0 mt-2 mb-2 mx-2 text-dark text-decoration-none rounded-top rounded-bottom checkout-link' style='background-color:#A9A9A9;'>Checkout</a>";  
          } else {
              echo "<a href='index.php' class='px-3 border-0 mt-2 mb-2 text-dark text-decoration-none rounded-top rounded-bottom' style='background-color:#F05941;'>Continue shopping</a>";

            }
            ?>
          </div>
        </form>

        <!-- ... JS code to manipulate tha cart... -->

        <script>
          document.addEventListener('DOMContentLoaded', function () {
            let totalPrice = document.querySelector(".totalPrice");
            let totalNav = document.querySelector(".total-nav");
            let formatted_prices = <?php echo $encoded_prices; ?>;
            let qtyInputs = document.querySelectorAll('.qty-input');
            let totalPriceInputs = document.querySelectorAll('.total-price-input');

            qtyInputs.forEach((qtyInput, index) => {
              qtyInput.addEventListener('input', () => {
                updateTotal(index);
                calculateOverallTotal();
              });
            });

            function updateTotal(index) {
              let unitValue = parseFloat(formatted_prices[index]);
              let qtyValue = parseInt(qtyInputs[index].value) || 0;
              let total = unitValue * qtyValue;
              totalPriceInputs[index].value = total.toFixed(2); // Format the total to two decimal places
            }

            function calculateOverallTotal() {
              let overallTotal = 0;
              totalPriceInputs.forEach((totalInput) => {
                overallTotal += parseFloat(totalInput.value) || 0;
              });

             
              totalPrice.innerText = overallTotal.toLocaleString('en-US', {
                style: 'currency',
                currency: 'NPR', // Change the currency code as needed
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
              });

              totalNav.innerText = overallTotal.toLocaleString('en-US', {
                style: 'currency',
                currency: 'NPR', // Change the currency code as needed
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
              });

             
            }
          });
        </script>




        <!---function to remove items---->

        <?php
        function remove_Cart_Item()
        {
          global $conn;
          if (isset($_POST['remove_cart'])) {
            foreach ($_POST['removeitem'] as $remove_id) { //until and unless we have chek button clicked corresponding id will be fetched
              //$_post['removeitem'] will access the value and store its value in $remove_id
              //echo $remove_id;
        
              $delete_query = "delete from `cart_details` where product_id=$remove_id";
              $run_delete = mysqli_query($conn, $delete_query);
              if ($run_delete) {
                "<script>window.open('cart.php','_self')</script>";
                //if everything works then return to cart.php
              }


            }
          }
        }

        echo $remove_item = remove_Cart_Item();
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</body>

</html>