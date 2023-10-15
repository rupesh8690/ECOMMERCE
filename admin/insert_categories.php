<?php

include('../includes/connect.php');
if(isset($_POST['insert_cat']))
{
  $category_title=$_POST['cat_title'];

  //selecting data from database
  $select_query="select *from categories where category_title='$category_title'";
  $result_select=mysqli_query($conn,$select_query);
  $number=mysqli_num_rows( $result_select);//count number of rows 
  if($number>0)
  {
    echo "<script> alert('This category is present inside the database') </script>";
  }

  else
  {
    $insert_query="insert into categories(category_title) values('$category_title')";
    $result=mysqli_query($conn,$insert_query);
    if($result)
    {
      echo "<script> alert('inserted successfully') </script>";
    }
    
  } 
}


?>


<h2 class="text-center my-3">Insert Categories</h2>


<form action=" " method="post" class="mb-2">
<!---input group--->
<div class="input-group  mb-3 mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text bg-info" id="basic-addon1"> <i class="fa-solid fa-receipt"></i></span>
  </div>
  <input type="text" class="form-control" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1" name="cat_title">
</div>

<div class="input-group">
<!-- <input type="submit" class="form-control bg-info text-dark"  aria-describedby="basic-addon1" name="cat_title"> -->

<button class="bg-info border-0 my-3 p-2 text-light" name="insert_cat">Insert Categories</button>

</div>



</form>