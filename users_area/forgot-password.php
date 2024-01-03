<?php
// Include necessary files and set error reporting
include('../includes/connect.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Function to send password reset email
function send_password_reset($get_name, $get_email, $token)
{
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP(); // Send using SMTP
        $mail->SMTPAuth = true; // Enable SMTP authentication

        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->Username = 'rupeshlove8690@gmail.com'; // SMTP username
        $mail->Password = 'pufx mqtk qfwg paiu'; // SMTP password

        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('rupeshlove8690@gmail.com', $get_name);
        $mail->addAddress($get_email); // Add a recipient

        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Reset password notification';

        $email_template = "
        <h2>Hello</h2>
        <h3>You are receiving this email because we received a password reset request from your account</h3>
        <br/><br/>
        <a href='http://localhost/ecommerce/ECOMMERCE/users_area/password-change.php?token=$token&email= $get_email'>Click Me </a>
        ";

        $mail->Body = $email_template;
        $mail->send();

        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "Exception details: {$e->getMessage()}";
    }
}

// Handle password reset form submission
if (isset($_POST['password-reset'])) {
    $email = mysqli_real_escape_string($conn, $_POST['useremail']);
    $token = md5(rand()); // Generate random number and alphabet

    $check_email = "SELECT * FROM user_table WHERE user_email='$email'";
    $check_email_run = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_assoc($check_email_run);
        $get_name = $row['username'];
        $get_email = $row['user_email'];

        $update_token = "UPDATE user_table SET verify_token='$token' WHERE user_email='$get_email' LIMIT 1 ";
        $update_token_run = mysqli_query($conn, $update_token);
        if ($update_token_run) {
            send_password_reset($get_name, $get_email, $token);

            $_SESSION['status'] = "We emailed you a password reset link";
            header("Location: password-reset.php");

            exit(0);

        } else {
            $_SESSION['status'] = "Something went wrong #1";
            header("Location: password-reset.php");

            exit(0);
        }
    } else {
        $_SESSION['status'] = "Email not found";
        header("Location: password-reset.php");
        exit(0);
    }
}

if (isset($_POST['password_update'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($conn, $_POST['password_token']);
    $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
    if (!empty($token)) {
        if (!empty($email) && !empty($new_password) && !empty($confirm_password)) {
            //checking token valid or not
            $check_token = "select verify_token from user_table where verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($conn, $check_token);
            if (mysqli_num_rows($check_token_run) > 0) {
                if ($new_password == $confirm_password) {
                    $update_password = "update user_table set user_password='$hash_password' where verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($conn, $update_password);
                    if ($update_password_run) {
                        //updating the existing token
                        $new_token=md5(rand());//md5(rand())."new text"
                        $update_to_new_token = "update user_table set verify_token='$new_token' where verify_token='$token' LIMIT 1";
                        $update_to_new_token_run = mysqli_query($conn, $update_to_new_token);
                        $_SESSION['status'] = "New Password successfully updated";
                        header("Location: userlogin.php");
                        exit(0);

                    } else {
                        $_SESSION['status'] = "Did not update passaword. Something wend wrong.";
                        header("Location: password-change.php?token=$token&email=$email");
                        exit(0);
                    }
                } else {
                    $_SESSION['status'] = "Password and confirm password do not matched!";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit(0);
                }


            } else {
                $_SESSION['status'] = "Invalid Token";
                header("Location: password-change.php?token=$token&email=$email");
                exit(0);

            }


        } else {
            $_SESSION['status'] = "All fields are mandatory";
            header("Location: password-change.php?token=$token&email=$email");
            exit(0);

        }

    } else {
        $_SESSION['status'] = "No token available";
        header("Location: password-change.php");
        exit(0);

    }


}

?>