<?php

include('../functions/common_function.php');
include('../includes/connect.php');

global $conn;
if(isset($_GET['edit_products']))
{
    $product_id=$_GET['edit_products'];
    $select_query="select *from products where product_id=$product_id";
    $data=mysqli_query($conn,$select_query);
    $row_fetch=mysqli_fetch_assoc($data);
    $product_title=$row_fetch['product_title'];
    $product_keywords=$row_fetch['product_keywords'];
    $product_description=$row_fetch['product_description'];
    $product_price=$row_fetch['product_price'];
    $product_image1=$row_fetch['product_image1'];
    $product_image2=$row_fetch['product_image2'];
    $product_image3=$row_fetch['product_image3'];

    $cat_id=$row_fetch['category_id'];
    //fetching category on the basis of category id
    $select_category_db="select * from categories where category_id=$cat_id";
    $result_cat=mysqli_query($conn,$select_category_db);
    
    $row_category=mysqli_fetch_assoc($result_cat);
    $cat_title=$row_category['category_title'];

    $brand_id=$row_fetch['brand_id'];
    //selecting brand on the basis of brand id
    $select_brand_db="select *from brands where brand_id=$brand_id";
    $result_brnd=mysqli_query($conn,$select_brand_db);
    $row_brand=mysqli_fetch_assoc($result_brnd);
    $brand_title=$row_brand['brand_title'];

  
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
       <!--bootstrap CSS Link --->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
 

       <!---font awesome--->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .edit_image
        {
            width: 6.25rem;
            height: 6.25rem;
        }

        </style>
</head>
<body>
<h3 class="text-center mt-3">Edit Products</h3>

  <div class="container">
   
    <form action="" method="post">
        <div class="form-outline mb-4 ">
            <label for="product_title" >Product Title</label>
            <input type="text" name="" id="product_title" class="form-control w-75 " value="<?php echo $product_title ?>" required="required">
        </div>

        <div class="form-group  mb-3">
            <label for="product_description">Product Description</label>
            <input type="text" name="product_description" id="" class="form-control w-75" value="<?php echo $product_description ?>" required="required">
        </div>

        <div class="form-group mb-3">
            <label for="product_keyword">Product Keyword</label>
            <input type="text" name="" id="product_keyword" class="form-control w-75" value="<?php echo $product_keywords ?>" required="required">
        </div>

        <div class="form-group mb-3">
            <label for="product_category">Category</label>
            <select class="form-control w-75" name="product_category">
            <option value="<?php echo $cat_title; ?> "><?php echo $cat_title;?> </option>
            <?php
                // selecting from category
                $select_category = "SELECT * FROM categories WHERE category_title <> '$cat_title'";

                $result_category=mysqli_query($conn,$select_category);
                while($data_category=mysqli_fetch_assoc($result_category))
                {
                    $category=$data_category['category_title'];
                   echo "  <option> $category</option>";

                }
                ?>

        
            </select>
        </div>

        <div class="form-group  mb-3">
            <label for="product_brand">Brand</label>
            <select class="form-control w-75" name="product_brand">
                <option><?php echo $brand_title ?></option>
             
                <?php
                //selecting all from brand
                $select_brand = "SELECT * FROM brands WHERE brand_title <> '$brand_title'";

     
                $result_brand=mysqli_query($conn,$select_brand);
                while($data_brand=mysqli_fetch_assoc($result_brand))
                {
                    $brand=$data_brand['brand_title'];
                   echo "  <option> $brand</option>";

                }
                ?>
           
          
            </select>
        </div>

        <div class="form group">
        <label for="product_image1">Image 1</label>
        </div>

        <div class="from-group d-flex align-items-start ">
            <input type="file" name="product_image1" id="" class="form-control w-75 ">
            <img src="./product_images/<?php echo $product_image1 ?>"  class="edit_image">

        </div>

        <div class="form group ">
        <label for="product_image2">Image 2</label>
        </div>

        <div class="from-group d-flex align-items-start">
            <input type="file" name="" id="product_image2" class="form-control w-75">
            <img src="./product_images/<?php echo $product_image2 ?>"  class="edit_image">

        </div>

        <div class="form group ">
        <label for="product_image3">Image 3</label>
        </div>

        <div class="from-group  d-flex align-items-start">
            <input type="file" name="product_image3" id="" class="form-control w-75">
            <img src="./product_images/<?php echo $product_image3 ?>"  class="edit_image">

        </div>

        <div class="form-group mb-3">
            <label for="product_price">Product Price</label>
            <input type="text" name="product_price" id="" class="form-control w-75" value="<?php echo $product_price ?>" required="required">
        </div>

        <div class="form-group mb-3 ">
            <input type="submit" value="Edit" name="edit_product" class="bg-info border-0 px-5 py-3 text-white rounded ">
        </div>


    </form>

  </div>
</body>
</html>