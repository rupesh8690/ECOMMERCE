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

</head>
<body>
<h3 class="text-center mt-3">Edit Products</h3>

  <div class="container mx-5">
   
    <form action="" method="post">
        <div class="form-outline mb-4 ">
            <label for="product_title" >Product Title</label>
            <input type="text" name="" id="product_title" class="form-control w-75 ">
        </div>

        <div class="form-group  mb-3">
            <label for="product_description">Product Description</label>
            <input type="text" name="product_description" id="" class="form-control w-75">
        </div>

        <div class="form-group mb-3">
            <label for="product_keyword">Product Keyword</label>
            <input type="text" name="" id="product_keyword" class="form-control w-75">
        </div>

        <div class="form-group mb-3">
            <label for="product_category">Category</label>
            <select class="form-control w-75" name="product_category">
            <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <div class="form-group  mb-3">
            <label for="product_brand">Brand</label>
            <select class="form-control w-75" name="product_brand">
            <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <div class="from-group mb-3">
            <label for="product_image1">Image 1</label>
            <input type="file" name="product_image1" id="" class="form-control w-75">

        </div>

        <div class="from-group mb-3">
            <label for="product_image2">Image 2</label>
            <input type="file" name="" id="product_image2" class="form-control w-75">

        </div>

        <div class="from-group mb-3">
            <label for="product_image3">Image 3</label>
            <input type="file" name="product_image3" id="" class="form-control w-75">

        </div>

        <div class="form-group mb-3">
            <label for="product_price">Product Price</label>
            <input type="text" name="product_price" id="" class="form-control w-75">
        </div>

        <div class="form-group mb-3 ">
            <input type="submit" value="Edit" name="edit_product" class="bg-info border-0 px-5 py-3 text-white rounded ">
        </div>


    </form>

  </div>
</body>
</html>