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
     * Get Order ID
     * @return string
     */
    public function getOrderId()
    {
        return $this->data['id'];
    }
}