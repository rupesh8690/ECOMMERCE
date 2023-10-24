<!---connect file--->
<?php
include('../functions/common_function.php');
include('../includes/connect.php');

if(isset($_GET['edit_brands']))
{
    $brand_id=$_GET['edit_brands'];
    $select_brand="select *from brands where brand_id=$brand_id";
    $result=mysqli_query($conn,$select_brand);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
}

if(isset($_POST['update_brand']))
{
    $new_brand_title=$_POST['brand_title'];
    $update_query="update `brands` SET `brand_title`='$new_brand_title' where brand_id=$brand_id";
    $result=mysqli_query($conn,$update_query);
    if($result)
    {
        

        echo "<script>alert('Updated Successfully')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
  
    }
}

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

<form action="" method="post">
    

   <div class="container">
   <div class="mb-3 mt-3 w-50">
  <label for="Category_title" class="form-label">Brand Title</label>
  <input type="text" class="form-control" name="brand_title" value="<?php echo $brand_title ?>">
</div>

<div class="mb-3 mt-3 w-50">
    <input type="submit" value="Update Brands"  name="update_brand" class="bg-info border-0 p-2 rounded-pill">

</div>

   </div>
   </form>
</body>
</html>