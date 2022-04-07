<?php
include("connection.php");
require '../stripe-vendor/autoload.php';
// retrieve JSON from POST body
$jsonStr = file_get_contents('php://input');
$jsonObj = json_decode($jsonStr);
$amout =number_format((float)$jsonObj->items[0]->amount, 2, '.', '');
if ($jsonObj->items[0]->currency == "dollar") {
    $currency="usd";
} elseif ($jsonObj->items[0]->currency == "euro") {
    
    $currency="eur";
} else {
    $currency="usd";
}
$totalamount= ($amout*100);

Stripe\Stripe::setApiKey(STRIPE_API_KEY);
header('Content-Type: application/json');
try {
    // Create a Customer For Stripe
  $customer =  \Stripe\Customer::create([
        'description' => $websitefetch["site_name"].' To Checkout By Stripe  Payment Method',
      ]);
    // Create a PaymentIntent with amount and currency
    $paymentIntent = \Stripe\PaymentIntent::create([
        'customer' => $customer->id, 
        'amount' => $totalamount,
        'currency' => "$currency",
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);
    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];
    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
