<?php
error_reporting(0);
include('../includes/connect.php');
if ($_POST['insert_product']) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    //accessing images

    $product_image1 = $_FILES['product_image1']['name']; //["tmp_name"] contains the temporary path to the uploaded file
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];





    //checking empty condition
    // if($product_title=='' or $product_description=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_price==''

    //  or $product_image1=='' or $product_image2=='' or $product_image3=='')

    //  {
    //     echo "<script> alert('all fields are required') </script>";
    //     exit();

    //  }

    //  else{

    //inserting images to product_images folder
    move_uploaded_file($temp_image1, "./product_images/$product_image1");
    move_uploaded_file($temp_image2, "./product_images/$product_image2");
    move_uploaded_file($temp_image3, "./product_images/$product_image3");
    //inserting to the database
    $insert_product = " INSERT INTO `products`(`product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) 
         VALUES ('$product_title','$product_description','$product_keyword','$product_category',' $product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

    $result_query = mysqli_query($conn, $insert_product);
    if ($result_query) {

        header('Location: insert_product.php?msg=success');


    } else {
        header('Location: insert_product.php?msg=error');
        // echo "<script> alert('problem occureed')</script>";

    }

    //  }






}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product-Admin Dashboard</title>

    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <!---font awesome link for icon--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--custom css file link--->
    <link rel="stylesheet" href="../styles.css">

    <style>
        .cont-bg {
            background-color: #EEF5FF;
        }
    </style>

</head>

<body class="">
    <div class="container cont-bg ">
        <h1 class="text-center mt-3">Insert Products</h1>
        <!--form-->
        <form action="" method="post" enctype="multipart/form-data">

            <!--product title--->

            <div class="form-group  w-50 m-auto ">
                <label for="product_title">Product Title</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="product_title"
                    placeholder="Enter product title" autocomplete="off" required="required">
            </div>


            <!--description-->

            <div class="form-group  w-50 m-auto">
                <label for="product_description" class="mt-3">Product description</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="product_description"
                    placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <!--keywords--->
            <div class="form-group  w-50 m-auto">
                <label for="product_keywords" class="mt-3">Product keywords</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="product_keyword"
                    placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <!--category--->

            <div class="form-group  w-50 m-auto">
                <select class="form-control mt-3" name="product_category">
                    <option value=" ">Select a Category</option>

                    <?php
                    $select_query = "select *from categories";
                    $result_query = mysqli_query($conn, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!--brand-->
            <div class="form-group  w-50 m-auto">
                <select class="form-control mt-3 " name="product_brand">
                    <option value="">Select a Brand</option>
                    <?php
                    $select_query = "select *from brands";
                    $result_query = mysqli_query($conn, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!--product image1--->
            <div class="form-group  w-50 m-auto">
                <label for="product_image" class="form-label mt-3">Product Image1</label>
                <input type="file" class="form-control-file" name="product_image1" id="" required="required">

            </div>


            <!--product image2--->
            <div class="form-group  w-50 m-auto">
                <label for="product_image" class="form-label mt-3">Product Image2</label>
                <input type="file" class="form-control-file" name="product_image2" id="" required="required">

            </div>


            <!--product image3--->
            <div class="form-group  w-50 m-auto">
                <label for="product_image" class="form-label mt-3">Product Image3</label>
                <input type="file" class="form-control-file" name="product_image3" id="" required="required">
            </div>


            <!---product price--->
            <div class="form-group  w-50 m-auto">
                <label for="product_price" class="form-label mt-3">Product Price</label>
                <input type="number" class="form-control" id="product_price" name="product_price"
                    placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!--submit button--->
            <div class="form-group  w-50 m-auto">

                <input type="submit" class="btn btn-info my-3 w-100" id="product_price" name="insert_product"
                    value="Insert Products" style=" background-color:#F05941;">
            </div>
        </form>
    </div>
</body>

</html>