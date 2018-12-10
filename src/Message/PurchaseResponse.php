<?php

namespace Omnipay\YandexMoney\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\YandexMoney\Helpers\ParametersTrait;

/**
 * YandexMoney Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    use ParametersTrait;

    /**
     * Get redirect status
     * @return bool
     */
    public function isRedirect()
    {
        return true;
    }

    /**
     * Get successful status
     * @return bool
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * Get pending status
     * @return bool
     */
    public function isPending()
    {
        return false;
    }

    /**
     * Get redirect Url
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->data->getConfirmation()->confirmationUrl;
    }

    /**
     * Get Order ID
     * @return string
     */
    public function getOrderId()
    {
        return $this->data->getId();
    }

    /**
     * Get the required redirect method.
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'POST';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     * @return array
     */
    public function getRedirectData()
    {
        return $this->data;
    }
}
