<?php

include('../includes/connect.php');
if (isset($_POST['insert_cat'])) {
  $category_title = $_POST['cat_title'];
  if ($category_title == '') {
    $_SESSION['category'] = "Category should not be empty!";

  } else {
    //selecting data from database
    $select_query = "select *from categories where category_title='$category_title'";
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select); //count number of rows 
    if ($number > 0) {
      $_SESSION['category'] = "This category already exists";
      // echo "<script> alert('This category is present inside the database') </script>";
    } else {
      $insert_query = "insert into categories(category_title) values('$category_title')";
      $result = mysqli_query($conn, $insert_query);
      if ($result) {
        // echo "<script> alert('inserted successfully') </script>";
        $_SESSION['category'] = "Category Inserted";
      }

    }

  }

}


?>

<?php
if (!isset($_SESSION['admin_name'])) {

  // echo 'login first';
  // echo "<a href='admin_login.php'><button type='button' class='btn btn-primary'  style='background-color: #F05941; color: #ffffff'>Click here to login</button></a>";

} else { ?>
  <h2 class="text-center my-3">Insert Categories</h2>

  <?php
  if (isset($_SESSION['category'])) {
    ?>
    <div class="alert alert-success">
      <h5>
        <?= $_SESSION['category']; ?>
      </h5>
    </div>
    <?php
    unset($_SESSION['category']);
  }



  ?>


  <form action=" " method="post" class="mb-2">
    <!---input group--->
  <div class="input-group  mb-3 mt-2">
    <div class="input-group-prepend">
      <span class="input-group-text " id="basic-addon1" style=" background-color:#F05941;"> <i
          class="fa-solid fa-receipt"></i></span>
    </div>
    <input type="text" class="form-control" placeholder="Insert Categories" aria-label="Username"
      aria-describedby="basic-addon1" name="cat_title">
  </div>

  <div class="input-group ">
    <!-- <input type="submit" class="form-control bg-info text-dark"  aria-describedby="basic-addon1" name="cat_title"> -->

      <button class=" border-0 my-3 p-2 text-white rounded " name="insert_cat" style=" background-color:#F05941;">Insert
        Categories</button>

    </div>



  </form>

<?php } ?>