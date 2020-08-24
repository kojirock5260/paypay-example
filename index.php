<?php

require_once './vendor/autoload.php';

$orderItems = new \Kojirock5260\PayPayExample\OrderItems();
$orderItems->add('商品A', 1, 500);
$orderItems->add('商品B', 3, 1000);
$orderItems->add('商品C', 2, 900);

$config = new \Kojirock5260\PayPayExample\Config([
    'merchantId'      => 'XXXXXXXXXXXXXXX',
    'apiKey'          => 'YYYYYYYYYYYYYY',
    'apiSecret'       => 'ZZZZZZZZZZZZZZZZZ',
    'redirectUrl'     => 'https://kojirooooocks.hatenablog.com/',
    'isAuthorization' => false,
    'production'      => false,
]);

$paypay = new \Kojirock5260\PayPayExample\PayPayAdapter($config);
$result = $paypay->createCode($orderItems, '商品A-商品B-商品C');
var_dump($result);die();

