<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!--bootstrap CSS Link --->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>My orders</title>
</head>
<body>
    <h3 class="text-center text-info mt-3">My orders</h3>
    
    <table class="table table-bordered text-center">
  

  <?php
  //getting user_id from user table
    global $conn;
    $username=$_SESSION['username'];
    $select_query = "SELECT * FROM `user_table` WHERE username='$username'";
    $result = mysqli_query($conn, $select_query);
    $row=mysqli_fetch_array($result);
    $user_id=$row['user_id'];

    //selecting data from user_orders on the user of userid

    $select_user_orders="SELECT * FROM `user_orders` where user_id=$user_id";
    $result_order=mysqli_query($conn,$select_user_orders);

  //   if(mysqli_num_rows($result_order)>0)
  //  {
   echo "  <thead class='bg-info'>
   <tr>
     <th scope='col'>SI no</th>
     <th scope='col'>Amout Due</th>
     <th scope='col'>Total products</th>
     <th scope='col'>Date</th>
     <th scope='col'>Complete/Incomplete</th>
     <th scope='col'>Status</th>
     
   </tr>
 </thead>";
// }
$si=1;

while ($row_data = mysqli_fetch_array($result_order)) {

    $amount=$row_data['amount_due'];
    $total_products=$row_data['total_products'];
    $order_date=$row_data['order_date'];
    $status=$row_data['order_status'];
    $order_id=$row_data['order_id'];
  
    if($status=="Pending")
    {
      $status="Incomplete";
    }
    else{
      $status="Complete";
    }

    
   
   echo "
   <tr>
    <td> $si</th>
    <td> $amount </td>
    <td> $total_products </td>
    <td> $order_date </td>
    <td> $status </td> ";
    ?>

    <?php
    if($status=='Complete')
    {
      echo "<td>Paid</td>";
    }
    else{
      echo "  <td> <a href='confirm_payment.php?order_id= $order_id' class='text-dark'>Confirm </a></td>
      </tr> ";
    }

    ?>
  
  <?php
  $si++;
}


?>
 
   
  </tbody>
</table>

</body>
</html>