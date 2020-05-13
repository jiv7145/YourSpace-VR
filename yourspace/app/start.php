<?php
require '../vendor/autoload.php';

define('SITE_URL', 'http://localhost/yourspace/payment');

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'Aa76p0OtaKXGd6lA4tifHfWbW_7UlzFVfL5lFOI8CFPo6GlpMJnFeDELRBO05L9pQ2JaIl1vgG9Lyrxb',
        'EE5abSJwhbzw-hZ31HHVW2700pNFAZTqmhDNYiKzaWUqJmjswndGltC7eI6MMSQEw5ZFwS9nCrEs4sqG')
    );
