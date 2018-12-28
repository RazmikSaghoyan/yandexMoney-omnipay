<?php

namespace Omnipay\YandexMoney\Message;

use YandexCheckout\Model\PaymentStatus;

/**
 * Class RefundResponse
 * @package Omnipay\YandexMoney\Message
 */
class RefundResponse extends PurchaseResponse
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
     * Get TransactionId
     * @return string
     */
    public function getTransactionId()
    {
        return $this->data['id'];
    }

    /**
     * Get
     * @return null|string
     */
    public function getTransactionReference()
    {
        return $this->getTransactionId();
    }
}