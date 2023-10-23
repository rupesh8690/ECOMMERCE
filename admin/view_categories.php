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
        <!---bootstrap css link --->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

    <!---font awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>View Categories</title>

    
</head>
<body>
    <div class="container">
        <h3 class="text-center text-info mt-3">All categories</h3>
    <table class="table table-bordered">
  <thead class="bg-info">

  <?php
  global $conn;
  //php code begin here to retrieve data from the database
  $select_query="SELECT * FROM `categories`";
  $result_query=mysqli_query($conn,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);

  if($num_of_rows>0)
  {
    echo " <thead class='bg-info'>
    <tr>
      <th scope='col'>S.no</th>
      <th scope='col'>Category Title</th>
      <th scope='col'>Edit</th>
      <th scope='col'>Delete</th>
   
    </tr>
  </thead>
  <tbody class='bg-secondary text-white text-center'>";

  $si_num=1;

  while($data=mysqli_fetch_assoc($result_query))
  {
    $category_id=$data['category_id'];
    $category_title=$data['category_title'];

    echo "   <tr>
    <td>$si_num</td>
    <td>$category_title</td>
    <td><a href='index.php?edit_category=$category_id' class='text-white'><i class='fa-solid fa-pen-to-square'></i> </a></td>
    <td><a href='' class='text-white'><i class='fa-solid fa-trash-can'></i> </a></td>
  </tr>";

  $si_num++;

  }
}

    ?>

  </tbody>
</table>
    </div>
    
</body>
</html>