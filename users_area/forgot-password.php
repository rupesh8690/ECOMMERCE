<?php
// Include necessary files and set error reporting
include('../includes/connect.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Function to send password reset email
function send_password_reset($get_name, $get_email)
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
        <br><br>";

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
            send_password_reset($get_name, $get_email);

            $_SESSION['status'] = "We emailed you a password reset link";

        } else {
            $_SESSION['status'] = "Something went wrong #1";
            header("Location: userlogin.php");

            exit(0);
        }
    } else {
        $_SESSION['status'] = "Email not found";
        header("Location: userlogin.php");
        exit(0);
    }
}
?>