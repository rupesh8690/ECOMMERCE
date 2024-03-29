<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Registration</title>
    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let passInput = document.querySelector('#user_password');
            let confPassword = document.querySelector('#conf_password');
            let form = document.querySelector('form');

            passInput.addEventListener("input", function () {
                let finalValue = this.value;
                if (finalValue.length < 6) {
                    passInput.setCustomValidity('Password must be at least 6 characters long');
                } else {
                    passInput.setCustomValidity('');
                }
                // Check if the passwords match whenever the user types in the password field
                if (finalValue !== confPassword.value) {
                    confPassword.setCustomValidity("Passwords don't match");
                } else {
                    confPassword.setCustomValidity('');
                }
            });

            confPassword.addEventListener('input', function () {
                // Check if the passwords match whenever the user types in the confirm password field
                if (passInput.value !== confPassword.value) {
                    confPassword.setCustomValidity("Passwords don't match");
                } else {
                    confPassword.setCustomValidity('');
                }
            });

            form.addEventListener('submit', function (event) {
                let finalValue = passInput.value;
                if (finalValue.length < 6 || passInput.value !== confPassword.value) {
                    event.preventDefault(); // Prevent form submission
                    if (finalValue.length < 6) {
                        alert("Password must be at least 6 characters long");
                    } else {
                        alert("Passwords don't match");
                    }
                }
            });
        });




    </script>
</head>

<body>
    <?php
    include('../includes/header.php');

    ?>
    <div class="py-5" style="margin-top: 5rem;">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">New User Registration</h5>

                        </div>
                        <div class="card-body p-4">
                            <form action="" method="post" enctype="multipart/form-data">
                                <!---"multipart/form-data" is typically used when you want to submit files (e.g., images, documents) along with other form data.--->

                                <div class="form-group">
                                    <label for="user_name" class="form-label">User name</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name"
                                        placeholder="Enter your username" autocomplete="off" required="required">
                                </div>

                                <div class="form-group">
                                    <label for="user_email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="user_email" name="user_email"
                                        placeholder="Enter your email address" autocomplete="off" required="required">
                                </div>


                                <div class="form-group">
                                    <label for="user_image" class="form-label">User image</label>
                                    <input class="form-control   p-1 m-0" type="file" id="user_image" name="user_image">
                                </div>


                                <div class="form-group">
                                    <label for="user_password">Password</label>
                                    <input type="password" class="form-control" id="user_password"
                                        placeholder="Password" name="user_password" required="required">
                                </div>

                                <div class="form-group">
                                    <label for="user_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="conf_password"
                                        placeholder="Password" name="conf_user_password" required="required">
                                </div>

                                <div class="form-group">
                                    <label for="user_address" class="form-label">Address </label>
                                    <input type="text" class="form-control" id="user_address"
                                        placeholder="Enter your  address" name="user_address" autocomplete="off"
                                        required="required">
                                </div>

                                <div class="form-group">
                                    <label for="user_number" class="form-label">Contact</label>
                                    <input class="form-control   p-1 m-0" type="number" id="user_number"
                                        name="user_number" placeholder="Enter your mobile number" required="required">
                                </div>

                                <div class="form-group">

                                    <input type="submit" value="Register" name="register"
                                        class="form-control text-white mb-3 py-2  px-3  border-0"
                                        style="background-color:#F05941;">
                                    <p class="small fw-bolder mt-2 pt-2 mb-0">Already have an account? <a
                                            href="userlogin.php" class="text-decoration-none text-danger">Login</a></p>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


</body>

</html>

<?php
if (isset($_POST['register'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_number = $_POST['user_number'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];

   
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);

    //checking whetheer user exist or not

    $select_query = " select * from `user_table` where username='$user_name' or user_email='$user_email'";
    $result_retrieve_query = mysqli_query($conn, $select_query);
    $rows_count = mysqli_num_rows($result_retrieve_query);
    if ($rows_count > 0) {
        echo "<script>alert('Username and email  already Exist')</script>";
        echo "<script>window.open('user_registration.php','_self')</script>";
    }

    // elseif ($user_password != $conf_user_password) {
    //     echo "<script>alert('Password do not match!')</script>"; //doesn't (apostrophe was not working)
    //     echo "<script>window.open('user_registration.php','_self')</script>";
    // } 
    else {

        // Move the uploaded file to the specified directory
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");

        $register_query = "INSERT INTO `user_table` (`username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`)
                VALUES ('$user_name', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_number')";
        $result_query = mysqli_query($conn, $register_query);


        if ($result_query) {
            $_SESSION['user_register'] = "Registered Successfully";
            echo '<script>window.location.href = "userlogin.php";</script>';
            // echo "User registration successful.";
        } else {
            // echo "Error inserting user data into the database.";
            $_SESSION['user_register'] = "Something went wrong!";
            echo '<script>window.location.href = "user_registration.php";</script>';

        }


    }
    //select cart items

    $select_cart_items = "select *from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($conn, $select_cart_items);
    $rows_count_cart = mysqli_num_rows($result_cart);
    if ($rows_count_cart > 0) {
        $_SESSION['username'] = $user_name;
        echo "<script>alert('You have items in your cart ')</script>";

        echo "<script>window.open('checkout.php','_self')</script>"; //_self means we want to open in same tab

    } else {
        echo "<script>window.open('../index.php','_self')</script>"; //_self means we want to open in same tab

    }
}
?>