<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>


</head>

<body>
    <h3 class="text-center text-danger">Delete Account</h3>

    <form action="" method="post">
        <div class="form-outline mb-4 ">
            <input type="submit" value="Delete Account" class="form-control w-50 m-auto " name="delete">
        </div>

        <div class="form-outline mb-4">
            <input type="submit" value="Dont Delete Account" class="form-control w-50 m-auto" name="dont_delete">
        </div>
    </form>
</body>

</html>

<?php

//not need to include function or session because delete_account is going to be included in profile.php file
$user_name = $_SESSION['username'];
if (isset($_POST['delete'])) {
    $delete_query = "delete from user_table where username='$user_name'";
    $result_delete = mysqli_query($conn, $delete_query);
    if ($result_delete) {
        session_destroy();
        echo "<script> alert('Account deleted successfully') ";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}

if (isset($_POST['dont_delete'])) {


    echo "<script>window.open('profile.php','_self')</script>";

}

?>