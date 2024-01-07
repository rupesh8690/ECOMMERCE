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

  <title>View orders</title>


</head>

<body>
<?php
  if (!isset($_SESSION['admin_name'])) {

    // echo 'login first';
    // echo "<a href='admin_login.php'><button type='button' class='btn btn-primary'  style='background-color: #F05941; color: #ffffff'>Click here to login</button></a>";
  
  } else { ?>
  <div class="container">
    <h3 class="text-center  mt-3" style='color:#F05941;'>All Orders</h3>
    <table class="table table-bordered">
      <thead class="bg-info">

        <?php
        global $conn;
        //php code begin here to retrieve data from the database
        $select_query = "SELECT * FROM `user_orders`";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
          echo " <thead class=' text-white text-center'  style='background-color:#F05941;'s>
    <tr>
      <th scope='col'>SI no</th>
      <th scope='col'>User Id</th>
      <th scope='col'>Items name</th>
      <th scope='col'>Due Amount</th>
      <th scope='col'>Invoice Number</th>
      <th scope='col'>Total Products</th>
      <th scope='col'>Order Date</th>
      <th scope='col'>Status</th>
      <th scope='col'>Delete</th>
   
    </tr>
  </thead>
  <tbody class=' text-dark text-center' style='background-color:#A9A9A9;'>";

          $si_num = 1;

          while ($data = mysqli_fetch_assoc($result_query)) {
            $order_id = $data['order_id'];
            $user_id=$data['user_id'];
            $amount_due = $data['amount_due'];
            $product_title=$data['items_name'];
            $invoice_number = $data['invoice_number'];
            $total_products = $data['total_products'];
            $order_date = $data['order_date'];
            $order_status = $data['order_status'];


            echo "   <tr>
    <td>$si_num</td>
    <td>$user_id</td>
    <td>$product_title</td>
    <td> $amount_due</td>
    <td>$invoice_number</td>
    <td>$total_products</td>
    <td>$order_date</td>
    <td>$order_status</td>
    <td><a href='index.php?delete_order=$order_id' class='text-dark' data-toggle='modal' data-target='#exampleModal'> <i class='fa-solid fa-trash-can'> </i> </a></td>
  </tr>";

            $si_num++;

          }
        } else {
          echo "     <h3 class='text-center text-danger'>No order available</h3>";

        }

        ?>

        </tbody>
    </table>

    <!--bootstrap model---->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <h4>Are you sure you want to delete this?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?all_order"
                class="text-light text-decoration-none">No</button>
            <button type="button" class="btn btn-primary"><a href="index.php?delete_order=<?php echo $order_id ?> "
                class="text-light text-decoration-none">Yes</a></button>
          </div>
        </div>
      </div>
    </div>
    <!---model end--->
  </div>

<?php } ?>
</body>

</html>