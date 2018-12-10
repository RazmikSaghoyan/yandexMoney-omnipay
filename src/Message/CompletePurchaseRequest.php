<?php

namespace Omnipay\YandexMoney\Message;

use Omnipay\YandexMoney\Helpers\ParametersTrait;

/**
 * YandexMoney Complete Purchase Request
 */
class CompletePurchaseRequest extends AbstractRequest
{
    use ParametersTrait;

    /**
     * Prepare data to send
     * @return array|mixed
     */
    public function getData()
    {
        $this->validate('amount', 'currency', 'paymentMethodId');

        $data = [
            'amount'   => [
                'value'    => $this->getAmount(),
                'currency' => $this->getCurrency()
            ],
            'orderId'  => $this->getPaymentMethodId(),
            'testMode' => $this->getTestMode()
        ];

        return $data;
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data
     *
     * @return \Omnipay\Common\Message\ResponseInterface|\Omnipay\YandexMoney\Message\PurchaseResponse
     */
    public function sendData($data)
    {
        $response = $this->yandex->capturePayment(
            [
                'amount'   => array_get($data, 'amount', []),
                'testMode' => array_get($data, 'testMode', [])
            ],
            array_get($data, 'orderId')
        );

        return $this->response = new CompletePurchaseResponse($this, $response);
    }
}
