<?php

namespace Omnipay\YandexMoney\Message;

/**
 * YandexMoney Complete Purchase Request
 */
class CompletePurchaseRequest extends AbstractRequest
{

    /**
     * Sets the request Amount
     * @param $value
     * @return mixed
     */
    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

    /**
     * Get Amount
     * @return mixed
     */
    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    /**
     * Sets the request Currency
     * @param $value
     * @return mixed
     */
    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }

    /**
     * Get Currency
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->getParameter('currency');
    }

    /**
     * Sets the request payment method ID.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setPaymentMethodId($value)
    {
        return $this->setParameter('paymentMethodId', $value);
    }

    /**
     * Get the request payment method ID.
     * @return $this
     */
    public function getPaymentMethodId()
    {
        return $this->getParameter('paymentMethodId');
    }

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
            'orderId'  => $this->getPaymentMethodId()
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
            ['amount'   => array_get($data, 'amount', [])],
            array_get($data, 'orderId')
        );

        return $this->response = new CompletePurchaseResponse($this, $response);
    }
}
