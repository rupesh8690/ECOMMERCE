<?php
include('../includes/connect.php');
session_start();

if (isset($_POST['admin_login'])) {
    $admin_name = trim($_POST['admin_name']);
    $admin_password = trim($_POST['admin_password']);

    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_name'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);

    $row_data = mysqli_fetch_assoc($result);

   

    if ($row_count > 0) {
        if ($admin_password == $row_data['admin_password']) {
            // Login successful
            $_SESSION['admin_name'] = $admin_name;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            // Password does not match
            echo "<script>alert('Invalid credentials');</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
            $error_message = "Invalid credentials";
        }
    } else {
        // No matching admin found
        echo "<script>alert('Admin not found');</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
       
    }
}


// else{
//     echo "<script>alert('No user Exist! Register first to sign in')</script>";

// }


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>






    <!---css --->
    <style>
        body {
            overflow-x: hidden;
            overflow-y: hidden;
        }

        .register_image {
            width: 100%;
            height: 70%;
            object-fit: contain;
        }

        .eye-pasword {
            width: 30px;
            height: 30px;
        }
    </style>
    <!--bootstrap css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>


    <div class="py-5" style="margin-top: 5rem;">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                  
                    <?php
                    if (isset($_SESSION['admin_register'])) {
                        ?>
                    <div class="alert alert-success">
                        <h5>
                            <?= $_SESSION['admin_register']; ?>
                        </h5>
                    </div>



                    <?php
                    unset($_SESSION['admin_register']);
                    } ?>
                    <div class="card">
                        <div class="card-header">

                            <h5 class="text-center">Admin Login Page</h5>

                        </div>
                        <div class="card-body p-5">
                            <form action="" method="post">
                                <label>User Name</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control " name="admin_name"
                                        placeholder="Enter your username" autocomplete="off" required="required">

                                </div>

                                <label> Password</label>
                                <div class="form-group mb-3">
                                    <input type="password" class="form-control" id="admin_password"
                                        placeholder="Password" name="admin_password" required="required">
                                </div>


                                <div class="form-group mb-3">

                                    <button type="submit" name="admin_login" class="btn  w-100"
                                        style="background-color: #F05941; color: #ffffff">Login</button>


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
    let admin_password = document.getElementById("admin_password");

    eyeicon.onclick = function () {
        if (admin_password.type == "password") {
            admin_password.type = "text";
            eyeicon.src="../image/eye.png";
        } else {
            admin_password.type = "password";
            eyeicon.src="../image/eye.svg";
        }
    }
</script> -->


    <!--Bootstrap javascript link--->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>