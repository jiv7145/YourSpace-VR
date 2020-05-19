<?php
require '../vendor/autoload.php';

define('SITE_URL', 'http://yourspacecounselling.herokuapp.com/');

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'yourspacecounselling@hotmail.com',
        'AZcRzI643ONcfez6xV1b7cKNaAWPR-a78ie-5uvWzA0oScK-al_Cmjbn2FypSlJrQ9_6fKeERazRqldq')
    );
    $paypal->setConfig(
        array(
            'mode' => 'live',
                'log.LogEnabled' => true,
                'log.FileName' => '../PayPal.log',
                'log.LogLevel' => 'INFO' // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
                )
        );