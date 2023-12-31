<?php
require('config.php');

if (isset($_POST['stripeToken'])) {
    \Stripe\Stripe::setVerifySslCerts(false);

    $token = $_POST['stripeToken'];
    $amount = $_POST['amount'];
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    // $amount = $_POST['amount'];
    $charge = \Stripe\Charge::create(array(
        "amount" => $amount * 100, // Convert amount to paisa
        "currency" => "inr",
        "description" => "Posting a Funding Research Project",
        "source" => $token,
    ));

    // Display receipt
    echo "<script>window.location.href = '" . $charge->receipt_url . "';</script>";
}
?>
