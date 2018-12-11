<?php

namespace Omnipay\YandexMoney\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\YandexMoney\Helpers\ParametersTrait;
use YandexCheckout\Model\PaymentStatus;

/**
 * YandexMoney Complete Purchase Response
 */
class CompletePurchaseResponse extends AbstractResponse
{
    /**
     * Get successful status
     * @return bool
     */
    public function isSuccessful()
    {
        return ($this->data['status'] === PaymentStatus::SUCCEEDED);
    }

    /**
     * Get Order ID
     * @return string
     */
    public function getOrderId()
    {
        return $this->data['id'];
    }

    /**
     * Get Description
     * @return string
     */
    public function getDescription()
    {
        return $this->data['description'];
    }

    /**
     * Get Payment Method Data
     * @return string
     */
    public function getPaymentMethodData()
    {
        return $this->data['payment_method'];
    }
}
