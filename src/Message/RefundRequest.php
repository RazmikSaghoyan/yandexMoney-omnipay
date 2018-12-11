<?php

namespace Omnipay\YandexMoney\Message;

use Omnipay\YandexMoney\Helpers\ParametersTrait;
use YandexCheckout\Model\PaymentStatus;

/**
 * Class RefundRequest
 * @package Omnipay\YandexMoney\Message
 */
class RefundRequest extends AbstractRequest
{
    use ParametersTrait;

    public function getData()
    {
        $this->validate('amount', 'currency', 'paymentMethodId');

        return [
            'payment_id'  => $this->getPaymentMethodId(),
            'amount'      => [
                'value'    => $this->getAmount(),
                'currency' => $this->getCurrency()
            ],
            'description' => $this->getDescription()
        ];
    }

    public function sendData($data)
    {
        $payment = $this->yandex->createRefund($data);

        if ($payment->getStatus() == PaymentStatus::WAITING_FOR_CAPTURE) {
            $response = $this->yandex->capturePayment(['amount' => array_get($data, 'amount', [])], $payment->getId());
        } else {
            $response = $payment;
        }

        return $this->response = new RefundResponse($this, $response);
    }
}