<?php

//inserting to the database


include('../includes/connect.php');
if (isset($_POST['insert_brand'])) {
  $brand_title = $_POST['brand_title'];

  //selecting data from database
  $select_query = "select *from brands where brand_title='$brand_title'";
  $result_select = mysqli_query($conn, $select_query);
  $number = mysqli_num_rows($result_select); //count number of rows 
  if ($number > 0) {
    echo "<script> alert('This brand is present inside the database') </script>";
  } else {
    $insert_query = "insert into brands(brand_title) values('$brand_title')";
    $result = mysqli_query($conn, $insert_query);
    if ($result) {
      echo "<script> alert('inserted successfully') </script>";
    }

  }
}


?>

<?php
 if (!isset($_SESSION['admin_name']))
 {

  // echo 'login first';
  // echo "<a href='admin_login.php'><button type='button' class='btn btn-primary'  style='background-color: #F05941; color: #ffffff'>Click here to login</button></a>";

 }
else{
?>
<h2 class="text-center my-3">Insert Brands</h2>
<form action=" " method="post" class="mb-2">
  <!---input group--->
  <div class="input-group  mb-3 mt-2">
    <div class="input-group-prepend">
      <span class="input-group-text " style=" background-color:#F05941;" id="basic-addon1"> <i
          class="fa-solid fa-receipt"></i></span>
    </div>
    <input type="text" class="form-control" placeholder="Insert Brands" aria-label="Insert Brands"
      aria-describedby="basic-addon1" name="brand_title">
  </div>

  <div class="input-group">
    <!-- <input type="submit" class="form-control bg-info text-dark"  aria-describedby="basic-addon1" name="cat_title"> -->

    <button class=" rounded border-0 my-3 p-2 text-light" name="insert_brand" style=" background-color:#F05941;">Insert
      Brands</button>

  </div>



</form> <?php } ?>