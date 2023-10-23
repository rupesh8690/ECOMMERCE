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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
 
    
    <!---font awesome link for icon--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
      .cart_image
        {
          width:100px;
          height:100px;
          object-fit:contain;

        }
      </style>
</head>
<body>
  <h3 class="text-center text-success mt-2">All products</h3>
<table class="table mt-3 mb-3">
  <?php
  global $conn;
  //php code begin here to retrieve data from the database
  $select_query="SELECT * FROM `products`";
  $result_query=mysqli_query($conn,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows>0)
  {
    echo " <thead class='bg-info'>
    <tr>
      <th scope='col'>Product ID</th>
      <th scope='col'>Product Title</th>
      <th scope='col'>Product Image</th>
      <th scope='col'>Product Price</th>
      <th scope='col'>Total Sold</th>
      <th scope='col'>Status</th>
      <th scope='col'>Edit</th>
      <th scope='col'>Delete</th>
    </tr>
  </thead>
  <tbody class='bg-secondary text-white'>";
  while($data=mysqli_fetch_assoc($result_query))
  {
    $product_id=$data['product_id'];
    $product_title=$data['product_title'];
    $product_image=$data['product_image1'];
    $product_price=$data['product_price'];

    ?>



 <tr class='text-center'>
    <td><?php echo $product_id ?></td>
    <td><?php echo $product_title?></td>
    <td><img src='./product_images/<?php echo $product_image?>' class='cart_image'></td>
    <td><?php echo  $product_price?></td>
    <td>
      <?php
      $select_sold="select * from orders_pending where product_id=$product_id";
      $data=mysqli_query($conn,$select_sold);
      $rows_count=mysqli_num_rows($data);
      echo $rows_count;

      ?>
    </td>
    <td>true</td>
    <td><a href='index.php?edit_products ' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
    <td><a href=' ' class='text-light'><i class='fa-solid fa-trash-can'></i></a></td>
  </tr> 
  
<?php
  }
}
  ?>
  

   
 
  </tbody>
</table>
  </tbody>
</table>
</body>
</html>