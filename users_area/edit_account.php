<?php
if(isset($_GET['edit_account']))
{
    $user_session_name=$_SESSION['username'];
    $select_query="select *from user_table where username='$user_session_name'";
    $data=mysqli_query($conn,$select_query);
    $row_fetch=mysqli_fetch_assoc($data);
    $username=$row_fetch['username'];
    $user_id=$row_fetch['user_id'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
}
    if(isset($_POST['user_update']))
    {
        $update_id=$user_id;
        $username=$_POST['user_name'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_number'];//values from name filed of the form

        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");

        $update_query="UPDATE `user_table` SET `username`='$username',`user_email`='$user_email',
        `user_image`='$user_image',`user_address`='$user_address',`user_mobile`='$user_mobile' where user_id=$update_id";

        $result_query_update=mysqli_query($conn,$update_query);
        if($result_query_update)
        {
            echo "<script>alert('Updated Successfully')</script>";
            echo"<script>window.open('logout.php' ,'_self') </script>";
          
          

        }
        else{
            echo "<script>alert('not updated')</script>";

        }

       
     
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        .edit_image
        {
            width: 6.25rem;
            height: 6.25rem;
        }
        </style>


</head>
<body>
  
<h3 class="text-success ">Edit Account</h3>
<form action="" method="post" enctype="multipart/form-data">

<div class="form-outline mb-4">
    <input type="text" name="user_name" id="" class="form-control m-auto w-50" value="<?php echo $user_session_name ?>">

</div>

<div class="form-outline mb-4">
    <input type="email" name="user_email" id="" class="form-control m-auto w-50" value="<?php echo $user_email ?>">

</div>

<div class="form-outline mb-4 d-flex w-50 m-auto">
    <input type="file" name="user_image" id="" class="form-control m-auto " >
    <img src="./user_images/<?php echo $user_image ?>" alt="" class="edit_image">


</div>

<div class="form-outline mb-4">
    <input type="text" name="user_address" id="" class="form-control m-auto w-50" value="<?php echo   $user_address ?>">

</div>

<div class="form-outline mb-4">
    <input type="text" name="user_number" id="" class="form-control m-auto w-50" value="<?php echo $user_mobile?>">

</div>

<input type="submit" value="Update" name="user_update" class="py-2 px-3 bg-info border-0 m-auto">
</form>
</body>
</html>