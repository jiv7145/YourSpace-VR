<?php
require '../vendor/autoload.php';

define('SITE_URL', 'http://localhost/yourspace/payment');

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ATEtfQ5lYVaqIgFUtzIQzSmohH3SAXlDRZmbV7rtB3gNIec-awM08xwnuzTDwBeyvP8orc74KY2FLBZG',
        'EE5abSJwhbzw-ENhR9d4QAbmRd0Xb2_pNRCQQ8FP06nYGMoj75Mqw4VO7Xh_BbUnsUx4-8EEyMdXv85SeMTMQtnc2JX_i')
    );
