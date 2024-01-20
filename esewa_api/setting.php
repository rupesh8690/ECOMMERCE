<?php 

// Change Info From Here

$epay_url = "https://uat.esewa.com.np/epay/main";
$pid = "eS" . uniqid();//uniqid function to generate a unique identifier and concatenate with MS
//it should be change on every transaction

// $successurl = "http://localhost/ecommerce/esewa_api/success.php?q=su";

$failedurl = "http://localhost/ecommerce/esewa_api/failed.php?q=fu";
$merchant_code = "epay_payment"; 
$fraudcheck_url = "https://uat.esewa.com.np/epay/transrec";

// For Amount Check
$actualamount = 315000;

?>