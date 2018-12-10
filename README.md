# Omnipay: Yandex Money

**Yandex Money driver for the Omnipay Laravel payment processing library**

[![Latest Stable Version](https://poser.pugx.org/razmiksaghoyan/omnipay-yandexmoney/version.png)](https://packagist.org/packages/razmiksaghoyan/omnipay-yandexmoney)
[![Total Downloads](https://poser.pugx.org/razmiksaghoyan/omnipay-yandexmoney/d/total.png)](https://packagist.org/packages/razmiksaghoyan/omnipay-yandexmoney)

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.5+. This package implements Yandex Money support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "razmiksaghoyan/omnipay-yandexmoney": "dev-master"
    }
}
```

And run composer to update your dependencies:

    composer update

Or you can simply run

    composer require razmiksaghoyan/omnipay-yandexmoney

## Basic Usage

1. Use Omnipay gateway class:

```php
    use Omnipay\Omnipay;
```

2. Initialize Yandex Money gateway and make a purchase:

```php
$gateway = Omnipay::create('YandexMoney');              // Getway name
$gateway->setShopId(env('SHOP_ID'));                    // Should be your Yandex Shop Id
$gateway->setSecretKey(env('SECRET_KEY'));              // Should be your Yandex Secrect Key
$gateway->setReturnUrl(env('RETURN_URL'));              // The URL to which you will be redirected after completing the purchase
$gateway->setAmount(10);                                // Amount to charge
$gateway->setCurrency('RUB');                           // Currency
$purchaseData->setDescription('Your Description');      // Payment Description
$purchaseData->setConfirmationType('redirect');         // Redirect Only 
$purchaseData->setSavePaymentMethod(true/false);        // Saving Payment Method
$purchaseData->setCapture(true/false);                  // Automatic acceptance of received payment
$purchaseData->setClientIp('Your Ip');                  // Client Ip Address

$purchase = $gateway->purchase()->send();

if ($purchase->isRedirect()) {
    // resturn RedirectUrl and OrderId, or write Your logic
    return [
        'redirectUrl' => $response->getRedirectUrl(),   // Redirection to previously generated unique URL 
        'orderId'     => $response->getOrderId()        // Payment Id
    ];
} else {
    throw new Exception($purchase->getMessage());
}
```

3. Completeng Payment <br>
You will be redirected to YandexMoney form page. 
After filling and submitting credit card (Yandex Money) data YandexMoney page will webhook http://example.com/xxx (refer to also to point 2)

```php

$gateway = Omnipay::create('YandexMoney');  // Getway name
$gateway->setShopId(env('SHOP_ID'));        // Should be your Yandex Shop Id
$gateway->setSecretKey(env('SECRET_KEY'));  // Should be your Yandex Secrect Key$$webService = $gateway->completePurchase([             

$response = $gateway->completePurchase(
    $paymentId,                             // Payment Id
    $amount                                 // Amount to charge
);

if ($response->isSuccessful()) {
    // resturn order Id, description and payment data, or write Your logic
    return [
        'orderId' => $response->getOrderId(),
        'description' => $response->getDescription(),
        'paymentdata' => $response->getPaymentMethodData()
    ];
}
```


For testing puposes you should use only AMD currency and charge not more than 10 AMD 

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](),
or better yet, fork the library and submit a pull request.
