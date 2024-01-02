<!---connect file--->
<?php
include('../functions/common_function.php');
include('../includes/connect.php');

if (isset($_GET['edit_category'])) {
    $category_id = $_GET['edit_category'];
    $select_category = "select *from categories where category_id=$category_id";
    $result = mysqli_query($conn, $select_category);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
}

if (isset($_POST['update_category'])) {
    $new_category_title = $_POST['category_title'];
    $update_query = "update `categories` SET `category_title`='$new_category_title' where category_id=$category_id";
    $result = mysqli_query($conn, $update_query);
    if ($result) {


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!---font awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>View Categories</title>


</head>

<body>
    <form method="post">
        <div class="container">
            <div class="mb-3 mt-3 w-50">
                <label for="Category_title" class="form-label">Category Title</label>
                <input type="text" class="form-control" name="category_title" value="<?php echo $category_title ?>">
            </div>

            <div class="mb-3 mt-3 w-50">
                <input type="submit" value="Update Category" name="update_category"
                    class="bg-info border-0 p-2 rounded-pill">

            </div>

        </div>
    </form>
</body>

</html>