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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <!---font awesome--->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>View Users</title>
  <style>
    .user_img {
      width: 30%;
      height: 25%;
      margin: auto;
      display: block;
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
  <div class="container">
    <h3 class="text-center  mt-3" style='color:#F05941;'>All Users</h3>
    <table class="table table-bordered">
      <thead class="bg-info">

        <?php
        global $conn;
        //php code begin here to retrieve data from the database
        $select_query = "SELECT * FROM `user_table`";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
          echo " <thead class=' text-white text-center' style='background-color:#F05941;'>
    <tr>
      <th scope='col'>SI no</th>
      <th scope='col'>User Id</th>
      <th scope='col'>Username</th>
      <th scope='col'>User Email</th>
      <th scope='col'>user Image</th>
      <th scope='col'>User Address</th>
      <th scope='col'>User Mobile</th>
 
   
    </tr>
  </thead>
  <tbody class=' text-dark text-center'  style='background-color:#A9A9A9;'>";

          $si_num = 1;

          while ($data = mysqli_fetch_assoc($result_query)) {
            $user_id=$data['user_id'];
            $user_name = $data['username'];
            $user_email = $data['user_email'];
            $user_image = $data['user_image'];
            $user_address = $data['user_address'];
            $user_mobile = $data['user_mobile'];


            echo "   <tr>
    <td>$si_num</td>
    <td>$user_id</td>
    <td>    $user_name</td>
    <td> $user_email</td>
    <td><img src='../users_area/user_images/$user_image' class='user_img'></td>
    <td>$user_address</td>
    <td>$user_mobile</td>
   ";

            $si_num++;

          }
        } else {
          echo "     <h3 class='text-center text-danger'>No order available</h3>";

        }

        ?>

        </tbody>
    </table>
  </div>

  <?php } ?>
</body>

</html>