# Captcha for Lumen 5/6/7

[![Latest Stable Version](https://poser.pugx.org/swjtuhyq/captcha/v/stable.svg)](https://packagist.org/packages/swjtuhyq/captcha)
[![Latest Unstable Version](https://poser.pugx.org/swjtuhyq/captcha/v/unstable.svg)](https://packagist.org/packages/swjtuhyq/captcha)
[![License](https://poser.pugx.org/swjtuhyq/captcha/license.svg)](https://packagist.org/packages/swjtuhyq/captcha)
[![Total Downloads](https://poser.pugx.org/swjtuhyq/captcha/downloads.svg)](https://packagist.org/packages/swjtuhyq/captcha)

A simple [Laravel 5/6](http://www.laravel.com/) service provider for including the [Captcha for Lumen](https://github.com/swjtuhyq/captcha).

## Preview
![Preview](https://image.ibb.co/kZxMLm/image.png)

- [Captcha for Laravel 5/6/7](#captcha-for-laravel-5-6-7)
  * [Preview](#preview)
  * [Installation](#installation)
  * [Usage](#usage)
  * [Configuration](#configuration)
  * [Example Usage](#example-usage)
    + [Session Mode:](#session-mode-)
    + [Stateless Mode:](#stateless-mode-)
- [Return Image](#return-image)
- [Return URL](#return-url)
- [Return HTML](#return-html)
- [To use different configurations](#to-use-different-configurations)
  * [Links](#links)
  
## Installation

The Captcha Service Provider can be installed via [Composer](http://getcomposer.org) by requiring the
`swjtuhyq/captcha` package and setting the `minimum-stability` to `dev` (required for Laravel 5) in your
project's `composer.json`.

```json
{
    "require": {
        "laravel/lumen-framework": "^6.0",
        "swjtuhyq/captcha": "~1.0"
    },
    "minimum-stability": "dev"
}
```

or

Require this package with composer:
```
composer require swjtuhyq/captcha
```

Update your packages with ```composer update``` or install with ```composer install```.

In Windows, you'll need to include the GD2 DLL `php_gd2.dll` in php.ini. And you also need include `php_fileinfo.dll` and `php_mbstring.dll` to fit the requirements of `swjtuhyq/captcha`'s dependencies.




## Usage

To use the Captcha Service Provider, you must register the provider when bootstrapping your Laravel application. There are
essentially two ways to do this.

Find the `providers` key in `config/app.php` and register the Captcha Service Provider.

```php
    'providers' => [
        // ...
        'Swjtuhyq\Captcha\CaptchaServiceProvider',
    ]
```

Find the `aliases` key in `config/app.php`.

```php
    'aliases' => [
        // ...
        'Captcha' => 'Swjtuhyq\Captcha\Facades\Captcha',
    ]
```

## Configuration

To use your own settings, publish config.

`config/captcha.php`

```php
return [
    'default'   => [
        'length'    => 5,
        'width'     => 120,
        'height'    => 36,
        'quality'   => 90,
        'math'      => true,  //Enable Math Captcha
        'expire'    => 60,    //Stateless/API captcha expiration
    ],
    // ...
];
```

## Example Usage
### Stateless Mode:
You get key and img from this url
`http://localhost/captcha/api/math`
and verify the captcha using this method:
```php
    //key is the one that you got from json response
    // fix validator
    // $rules = ['captcha' => 'required|captcha_api:'. request('key')];
    $rules = ['captcha' => 'required|captcha_api:'. request('key') . ',math'];
    $validator = validator()->make(request()->all(), $rules);
    if ($validator->fails()) {
        return response()->json([
            'message' => 'invalid captcha',
        ]);

    } else {
        //do the job
    }
```

# Return Image
```php
captcha();
```
or
```php
Captcha::create();
```


# Return URL
```php
captcha_src();
```
or
```
Captcha::src('default');
```

# Return HTML
```php
captcha_img();
```
or
```php
Captcha::img();
```

# To use different configurations
```php
captcha_img('flat');

Captcha::img('inverse');
```
etc.

Based on [Captcha for Laravel 5/6/7/8](https://github.com/mewebstudio/captcha)

^_^

## Links
* [Intervention Image](https://github.com/Intervention/image)
* [L5 Captcha on Github](https://github.com/mewebstudio/captcha)
* [L5 Captcha on Packagist](https://packagist.org/packages/swjtuhyq/captcha)
* [For L4 on Github](https://github.com/mewebstudio/captcha/tree/master-l4)
* [License](http://www.opensource.org/licenses/mit-license.php)
* [Laravel website](http://laravel.com)
