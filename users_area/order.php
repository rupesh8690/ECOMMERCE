<?php
include('../functions/common_function.php');
include('../includes/connect.php');

if(isset($_GET['user_id']))
{
    $user_id=$_GET['user_id'];
    echo $user_id;
}
?>