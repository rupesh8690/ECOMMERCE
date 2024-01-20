<!---connect file--->
<?php
include('../functions/common_function.php');
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View products</title>

  <!--bootstrap CSS Link --->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



  <!---font awesome link for icon--->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .cart_image {
      width: 100px;
      height: 100px;
      object-fit: contain;

    }
  </style>
</head>

<body>
  <?php
  if (!isset($_SESSION['admin_name'])) {

    // echo 'login first';
    // echo "<a href='admin_login.php'><button type='button' class='btn btn-primary'  style='background-color: #F05941; color: #ffffff'>Click here to login</button></a>";
  
  } else { ?>
  <h3 class="text-center  mt-2" style="color:#F05941;">All products</h3>
  <table class="table mt-3 mb-3">
    <?php
    global $conn;
    //php code begin here to retrieve data from the database
    $select_query = "SELECT * FROM `products`";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);

    if ($num_of_rows > 0) {
      echo " <thead class='text-white' style='background-color:#F05941;'>
    <tr class='text-center'>
      <th scope='col'>Product ID</th>
      <th scope='col'>Product Title</th>
      <th scope='col'>Product Image</th>
      <th scope='col'>Product Price</th>

   
      <th scope='col'>Edit</th>
      <th scope='col'>Delete</th>
    </tr>
  </thead>
  <tbody class=' text-dark' style='background-color:#A9A9A9;'>";
      while ($data = mysqli_fetch_assoc($result_query)) {
        $product_id = $data['product_id'];
        $product_title = $data['product_title'];
        $product_image = $data['product_image1'];
        $product_price = $data['product_price'];

        ?>



    <tr class='text-center'>
      <td>
        <?php echo $product_id ?>
      </td>
      <td>
        <?php echo $product_title ?>
      </td>
      <td><img src='./product_images/<?php echo $product_image ?>' class='cart_image'></td>
      <td>
        <?php echo $product_price ?>
      </td>
     
      
      <td><a href='index.php?edit_products=<?php echo $product_id ?> ' class='text-dark'><i
            class='fa-solid fa-pen-to-square'></i></a></td>
      <td>
        <a href="#" class="text-dark">
          <i class="fa-solid fa-trash-can" onclick="confirmDelete(<?php echo $product_id; ?>)"></i>
        </a>
      </td>

    </tr>

    <?php


      }
    }
    ?>

    <?php
    // Validation for deletion
    echo '<script>
function confirmDelete(product_id) {
    if (confirm("Are you sure you want to delete this product?")) {
        window.location.href = "delete_product.php?product_id=" + product_id;
    }
}
</script>';
    ?>




    </tbody>
  </table>
  </tbody>
  </table>
  <?php } ?>
</body>

</html>