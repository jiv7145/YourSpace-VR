<?php
require '../vendor/autoload.php';

define('SITE_URL', 'http://www.yourspacecounselling.net/');

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AZcRzI643ONcfez6xV1b7cKNaAWPR-a78ie-5uvWzA0oScK-al_Cmjbn2FypSlJrQ9_6fKeERazRqldq',
        'EHZ3oBW4fdCaE0tuYOEqxBlxBj2cT7z_34RwUg2f5AGkxyEwVNI9h7ftWbfbZVO4nViWKuTSNgkOiE8P')
    );

    $paypal->setConfig(
        array(
          'log.LogEnabled' => true,
          'log.FileName' => 'PayPal.log',
          'log.LogLevel' => 'DEBUG',
          'mode' => 'live'
        )
  );