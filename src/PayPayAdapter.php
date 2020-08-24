<?php


namespace Kojirock5260\PayPayExample;


use PayPay\OpenPaymentAPI\Client;
use PayPay\OpenPaymentAPI\Models\CreateQrCodePayload;

class PayPayAdapter
{
    private Config $config;

    /**
     * PayPayAdapter constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param OrderItems $orderItems
     * @param string     $paymentId
     * @return mixed
     * @throws \Exception
     */
    public function createCode(OrderItems $orderItems, string $paymentId)
    {
        $client = new Client([
            'API_KEY'     => $this->config->apiKey(),
            'API_SECRET'  => $this->config->apiSecret(),
            'MERCHANT_ID' => $this->config->merchantId(),
        ], $this->config->isProduction());

        $payload = new CreateQrCodePayload();
        $payload->setOrderItems($orderItems->items());
        $payload->setMerchantPaymentId($paymentId);
        $payload->setCodeType("ORDER_QR");
        $payload->setAmount(['amount' => $orderItems->total(), 'currency' => 'JPY']);
        $payload->setRedirectType('WEB_LINK');
        $payload->setIsAuthorization($this->config->isAuthorization());
        $payload->setRedirectUrl($this->config->redirectUrl());

        return $client->code->createQRCode($payload);
    }
}