<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mithila Store | Reset Password</title>

    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>
    <?php
    include('../includes/header.php');

    ?>

    <div class="py-5" style="margin-top: 5rem;">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

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
                    <div class="card">
                        <div class="card-header">
                            <h5>Change Password</h5>

                        </div>
                        <div class="card-body p-4">
                            <form action="forgot-password.php" method="post">
                                <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])) { echo $_GET['token']; } ?>">
                                <label>Email address</label>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php if(isset($_GET['email'])) { echo $_GET['email']; } ?>">
                                </div>

                                <label>New Password</label>
                                <div class="form-group">
                                    <input type="password" name="new_password" class="form-control"
                                        placeholder="Enter new password">
                                </div>

                                <label>Confirm Password</label>
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control"
                                        placeholder="Enter confirm password">
                                </div>

                                <div class="form-group">

                                    <button type="submit" name="password_update" class="btn  w-100"
                                        style="background-color: #F05941; color: #ffffff">Update
                                        Password</button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>





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