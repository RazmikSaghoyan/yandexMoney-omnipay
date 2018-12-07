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

2. Initialize Yandex gateway:

```php



```

3. Processing payment <br>
After payment request approval, call receive positive or negative response 



4. Completeng Payment <br>


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
