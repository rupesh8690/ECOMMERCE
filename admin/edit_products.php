<?php

include('../functions/common_function.php');
include('../includes/connect.php');

global $conn;
if (isset($_GET['edit_products'])) {
    $product_id = $_GET['edit_products'];
    $select_query = "select *from products where product_id=$product_id";
    $data = mysqli_query($conn, $select_query);
    $row_fetch = mysqli_fetch_assoc($data);
    $product_title = $row_fetch['product_title'];
    $product_keywords = $row_fetch['product_keywords'];
    $product_description = $row_fetch['product_description'];
    $product_price = $row_fetch['product_price'];
    $product_image1 = $row_fetch['product_image1'];
    $product_image2 = $row_fetch['product_image2'];
    $product_image3 = $row_fetch['product_image3'];

    $cat_id = $row_fetch['category_id'];
    //fetching category on the basis of category id
    $select_category_db = "select * from categories where category_id=$cat_id";
    $result_cat = mysqli_query($conn, $select_category_db);

    $row_category = mysqli_fetch_assoc($result_cat);
    $cat_title = $row_category['category_title'];

    $brand_id = $row_fetch['brand_id'];
    //selecting brand on the basis of brand id
    $select_brand_db = "select *from brands where brand_id=$brand_id";
    $result_brnd = mysqli_query($conn, $select_brand_db);
    $row_brand = mysqli_fetch_assoc($result_brnd);
    $brand_title = $row_brand['brand_title'];


}

if (isset($_POST['edit_product'])) {
    $update_title = $_POST['product_title'];
    $update_description = $_POST['product_description'];
    $update_keyword = $_POST['product_keyword'];



    //getting category
    $update_category = $_POST['product_category'];

    //getting brand
    $update_brand = $_POST['product_brand'];

    //getting category id on the basis of category title
    $select_new_cat_id = "SELECT * FROM categories WHERE category_title='$update_category'";
    $result_new_cat_id = mysqli_query($conn, $select_new_cat_id);
    $row_new_cat_id = mysqli_fetch_assoc($result_new_cat_id);

    if ($row_new_cat_id) {
        $new_cat_id = $row_new_cat_id['category_id']; // Use square brackets
    } else {
        // Handle the case where the category was not found.
        echo "<script>alert('problem')</script>";
    }

    //getting brand id on the basis of brand title
    $select_new_brand_id = "SELECT * FROM brands WHERE brand_title='$update_brand'";
    $result_new_brand_id = mysqli_query($conn, $select_new_brand_id);
    $row_new_brand_id = mysqli_fetch_assoc($result_new_brand_id);

    if ($row_new_brand_id) {
        $new_brand_id = $row_new_brand_id['brand_id']; // Use square brackets
    } else {
        // Handle the case where the category was not found.
        echo "<script>alert('problem')</script>";
    }






    // Check if a new image file has been uploaded for Image 1
    if (empty($_FILES['product_image1']['name'])) {
        // No new file for Image 1, keep the existing value
        $product_image1 = $product_image1; // Replace with the actual value from the database
    } else {
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image_tmp1 = $_FILES['product_image1']['tmp_name'];
        move_uploaded_file($product_image_tmp1, "./product_images/$product_image1");
    }

    if (empty($_FILES['product_image2']['name'])) {
        $product_image2 = $product_image2; // No new file for Image 2, keep existing value
    } else {
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image_tmp2 = $_FILES['product_image2']['tmp_name'];
        move_uploaded_file($product_image_tmp2, "./product_images/$product_image2");
    }

    if (empty($_FILES['product_image3']['name'])) {
        $product_image3 = $product_image3; // No new file for Image 3, keep existing value
    } else {
        $product_image3 = $_FILES['product_image3']['name'];
        $product_image_tmp3 = $_FILES['product_image3']['tmp_name'];
        move_uploaded_file($product_image_tmp3, "./product_images/$product_image3");
    }

    // The rest of your code for SQL query and form processing

    //price
    $update_price = $_POST['product_price'];

    if ($update_title == '' or $update_description == '' or $update_description == '' or $update_category == '' or $update_brand == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == '' or $product_price == '') {
        echo "<script>alert('All fields are required!')</script>";
        echo "<script>window.open('edit_products.php' ,'_self') </script>";
    } else {
        $update_query = "UPDATE `products` SET 
        `product_title`='$update_title',
        `product_description`='$update_description',
        `product_keywords`='$update_keyword',
        `category_id`='$new_cat_id',
        `brand_id`=' $new_brand_id',
        `product_image1`='$product_image1',
        `product_image2`='$product_image2',
        `product_image3`='$product_image3',
        `product_price`='$update_price',
        `date`=NOW() 
        WHERE product_id=$product_id";

        $result_update = mysqli_query($conn, $update_query);

        if ($result_update) {
            echo "<script>alert('updated successfully')</script>";
            echo "<script>window.open('insert_product.php' ,'_self') </script>";

        } else {
            echo "<script>alert('Not updated ')</script>";
        }


    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <!---font awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .edit_image {
            width: 6.25rem;
            height: 6.25rem;
        }
    </style>
</head>

<body>
    <h3 class="text-center mt-3">Edit Products</h3>

    <div class="container">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 ">
                <label for="product_title">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control w-75 "
                    value="<?php echo $product_title ?>" required="required">
            </div>

            <div class="form-group  mb-3">
                <label for="product_description">Product Description</label>
                <input type="text" name="product_description" id="" class="form-control w-75"
                    value="<?php echo $product_description ?>" required="required">
            </div>

            <div class="form-group mb-3">
                <label for="product_keyword">Product Keyword</label>
                <input type="text" name="product_keyword" class="form-control w-75"
                    value="<?php echo $product_keywords ?>" required="required">
            </div>

            <div class="form-group mb-3">
                <label for="product_category">Category</label>
                <select class="form-control w-75" name="product_category">
                    <option value="<?php echo $cat_title; ?> ">
                        <?php echo $cat_title; ?>
                    </option>
                    <?php
                    // selecting from category
                    $select_category = "SELECT * FROM categories WHERE category_title <> '$cat_title'";

                    $result_category = mysqli_query($conn, $select_category);
                    while ($data_category = mysqli_fetch_assoc($result_category)) {
                        $category = $data_category['category_title'];
                        echo "  <option> $category</option>";

                    }
                    ?>


                </select>
            </div>

            <div class="form-group  mb-3">
                <label for="product_brand">Brand</label>
                <select class="form-control w-75" name="product_brand">
                    <option>
                        <?php echo $brand_title ?>
                    </option>

                    <?php
                    //selecting all from brand
                    $select_brand = "SELECT * FROM brands WHERE brand_title <> '$brand_title'";


                    $result_brand = mysqli_query($conn, $select_brand);
                    while ($data_brand = mysqli_fetch_assoc($result_brand)) {
                        $brand = $data_brand['brand_title'];
                        echo "  <option> $brand</option>";

                    }
                    ?>


                </select>
            </div>

            <div class="form group">
                <label for="product_image1">Image 1</label>
            </div>

            <div class="from-group d-flex align-items-start ">
                <input type="file" name="product_image1" class="form-control w-75 ">
                <img src="./product_images/<?php echo $product_image1 ?>" class="edit_image">

            </div>

            <div class="form group ">
                <label for="product_image2">Image 2</label>
            </div>

            <div class="from-group d-flex align-items-start">
                <input type="file" name="product_image2" class="form-control w-75">
                <img src="./product_images/<?php echo $product_image2 ?>" class="edit_image">

            </div>

            <div class="form group ">
                <label for="product_image3">Image 3</label>
            </div>

            <div class="from-group  d-flex align-items-start">
                <input type="file" name="product_image3" class="form-control w-75">
                <img src="./product_images/<?php echo $product_image3 ?>" class="edit_image">

            </div>

            <div class="form-group mb-3">
                <label for="product_price">Product Price</label>
                <input type="text" name="product_price" class="form-control w-75" value="<?php echo $product_price ?>"
                    required="required">
            </div>

            <div class="form-group mb-3 ">
                <input type="submit" value="Update Products" name="edit_product"
                    class=" border-0 px-5 py-3 text-white rounded " style=" background-color: #F05941;">
            </div>


        </form>

    </div>
</body>

</html>