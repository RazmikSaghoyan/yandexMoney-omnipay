<?php

namespace Omnipay\YandexMoney;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Http\ClientInterface;
use Omnipay\YandexMoney\Helpers\ParametersTrait;
use Omnipay\YandexMoney\Message\RefundRequest;
use YandexCheckout\Client;
use Symfony\Component\HttpFoundation\Request as HttpRequest;
use Omnipay\YandexMoney\Message\CompletePurchaseRequest;
use Omnipay\YandexMoney\Message\PurchaseRequest;

/**
 * YandexMoney Gateway
 */
class Gateway extends AbstractGateway
{
    use ParametersTrait;

    /**
     * Gateway constructor.
     *
     * @param \Omnipay\Common\Http\ClientInterface|null      $httpClient
     * @param \Symfony\Component\HttpFoundation\Request|null $httpRequest
     */
    public function __construct(ClientInterface $httpClient = null, HttpRequest $httpRequest = null)
    {
        $this->yandex = new Client();

        parent::__construct($httpClient, $httpRequest);
    }

    /**
     * Create request
     *
     * @param string $class
     * @param array  $parameters
     *
     * @return mixed|\Omnipay\Common\Message\AbstractRequest
     */
    public function createRequest($class, array $parameters)
    {
        $this->yandex->setAuth($this->getShopId(), $this->getSecretKey());

        $obj = new $class($this->httpClient, $this->httpRequest, $this->yandex);

        return $obj->initialize(array_replace($this->getParameters(), $parameters));
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return 'YandexMoney';
    }

    /**
     * Get default parameters
     * @return array|\Illuminate\Config\Repository|mixed
     */
    public function getDefaultParameters()
    {
        return [
            'shopId'    => '',
            'secretKey' => '',
            'returnUrl' => '',
        ];
    }

    /**
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    /**
     * Complete purchase
     *
     * @param array $options
     *
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }

    /**
     * Create a refund request
     *
     * @param array $options
     *
     * @return mixed|\Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function refund(array $options = array())
    {
        return $this->createRequest(RefundRequest::class, $options);
    }
}
