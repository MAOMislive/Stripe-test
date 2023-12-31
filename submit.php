<?php
require('config.php');

if (isset($_POST['stripeToken'])) {
    \Stripe\Stripe::setVerifySslCerts(false);

    $token = $_POST['stripeToken'];
    $amount = $_POST['amount'];
    
    $charge = \Stripe\Charge::create(array(
        "amount" => $amount * 100, // Convert amount to paisa
        "currency" => "inr",
        "description" => "YOUR_PROJECT_TITLE",
        "source" => $token,
    ));

    // Generate receipt 
    echo "<script>window.location.href = '" . $charge->receipt_url . "';</script>"; //this script code will lead to open the receipt in the current page.
}
?>
