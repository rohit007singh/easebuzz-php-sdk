<?php

use Easebuzz\Easebuzz;

$config = include('config.php');
$MERCHANT_KEY = $config['MERCHANT_KEY'];
$SALT = $config['SALT'];
$ENV = $config['ENV'];

$easebuzz = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);
$data = [
    "txnid" => rand(100000, 999999),
    "amount" => "100.0",
    "firstname" => "jitendra",
    "email" => "test@gmail.com",
    "phone" => "1231231235",
    "productinfo" => "Laptop",
    "surl" => "http://localhost:8000/response.php",
    "furl" => "http://localhost:8000/response.php",
    "udf1" => "",
    "udf2" => "",
    "udf3" => "",
    "udf4" => "",
    "udf5" => "",
    "address1" => "",
    "address2" => "",
    "city" => "",
    "state" => "",
    "country" => "",
    "zipcode" => ""
];
// return the status and the link
$result = $easebuzz->initiatePaymentAPI($data);
// redirect to the link
easebuzzAPIResponse($result);

function easebuzzAPIResponse($data)
{
    header('Location: ' . $data->data);
}
