<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Login</title>
    <!---font awesome link for icon--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--custom css file link--->
    <link rel="stylesheet" href="../styles.css">
    <!--css code for hiding horizontal scroll bar--->
    <style>
        body {
            overflow-x: hidden;
        }

        .eye-pasword {
            width: 30px;
            height: 30px;
        }

        .custom-color {
            background-color: #F05941;

        }

        .second-nav-bg {
            background-color: #A9A9A9;
        }

        #user_password:focus {
            outline: none;
            /* Remove the focus outline (default browser behavior) */
            box-shadow: none;
            /* Remove any focus box shadow */
            border-color: initial;
            /* Reset the border color to its initial value */
        }

        .passwordDiv:focus {
            border: 1px solid #007BFF;
        }
    </style>

</head>

<body>

    <?php
    include('../includes/header.php');

    ?>

    <div class="py-5" style="margin-top: 5rem;">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <!--show success message from password reset-->
                    <?php
                    if (isset($_SESSION['status'])) {
                        ?>
                    <div class="alert alert-success">
                        <h5>
                            <?= $_SESSION['status']; ?>
                        </h5>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                    }
                    ?>
                    <!-- // show success message when user registered successfully -->
                    <?php
                    if (isset($_SESSION['user_register'])) {
                        ?>
                    <div class="alert alert-success">
                        <h5>
                            <?= $_SESSION['user_register']; ?>
                        </h5>
                    </div>



                    <?php
                    unset($_SESSION['user_register']);
                    } ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Login Page</h5>

                        </div>
                        <div class="card-body p-4">
                            <form action="" method="post">
                                <label>User Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control " id="user_name" name="user_name"
                                        placeholder="Enter your username" autocomplete="off" required="required">

                                </div>

                                <label> Password</label>
                                <div class="form-group">
                                    <input type="password" name="user_password" class="form-control"
                                        placeholder=" password" required="required" id="user_password">
                                </div>


                                <div class="form-group">
                                    <a href="password-reset.php" style="color:#F05941;">Forgot
                                        password</a>

                                </div>

                                <div class="form-group">

                                    <button type="submit" name="user_login" class="btn  w-100"
                                        style="background-color: #F05941; color: #ffffff">Login</button>

                                    <p class="small fw-bolder mt-2 pt-2 mb-0"><strong>Don't have an account? </strong><a
                                            href="user_registration.php" class="text-decoration-none "
                                            style="color:#F05941;">Register</a></p>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>





    <!-- <script>
    let eyeicon = document.getElementById("eyeicon");
    let user_password = document.getElementById("user_password");

    eyeicon.onclick = function () {
        if (user_password.type == "password") {
            user_password.type = "text";
            eyeicon.src="../image/eye.png";
        } else {
            user_password.type = "password";
            eyeicon.src="../image/eye.svg";
        }
    }
</script> -->


    <!-- Bootstrap JS (required for modal functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php
if (isset($_POST['user_login'])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $select_query = "select * from `user_table` where username='$user_name'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result); // This is a PHP function used to fetch a row of data from a MySQL database result set as an associative array

    // cart item
    $user_ip = getIPAddress();

    $select_query_cart = "select *from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($conn, $select_query_cart);
    $row_count_cart = mysqli_num_rows($result_cart);

    if ($row_count > 0) {
        $_SESSION['username'] = $user_name; //creating session variable accecing the user name and storing inside the session variable
        if (password_verify($user_password, $row_data['user_password'])) //unshasing the password and verifying
        {
            // echo "<script>alert('Login successfull ".$user_ip ."')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_name;
                echo "<script>alert('Login successfull')</script>";
                echo "<script>window.open('profile.php','_self') </script>";


            } else {
                $_SESSION['username'] = $user_name;
                echo "<script>alert('Login successfull')</script>";
                echo "<script>window.open('../cart.php','_self') </script>";
            }

        } else {
            echo "<script>alert('invalid credential')</script>";
        }

    } else {
        echo "<script>alert('invalid credential')</script>";

    }

}

?>