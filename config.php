<?php
require('stripe-php-master/init.php');

$publishableKey="YOUR_PUBLISHABLE_KEY";

$secretKey="YOUR_SECRET_KEY";

\Stripe\Stripe::setApiKey($secretKey);
?>
