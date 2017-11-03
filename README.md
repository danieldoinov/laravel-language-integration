# Laravel Language Integration

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]
     
```Provides functionality to dynamically change a Laravel current locale. Basically makes laravel multilingial from a users stand point.```

## Install

Via Composer

``` bash
$ composer require danieldoinov/LanguageIntegration
```

This package has integrated geo-location that uses the following package

``Stevebauman\Location``

It should be installed automatically with this one but just in case that it isn't you can install it by running 

```php
composer require stevebauman/location

```
You must add the providers in config/app.php 

``` php
Stevebauman\Location\LocationServiceProvider::class,
DanielDoinov\LanguageIntegration\LanguageIntegrationServiceProvider::class
```
You can then publish the configuration files.

``` php
php artisan vendor:publish --provider="danieldoinov\LanguageIntegration\LanguageIntegrationProvider"
php artisan vendor:publish --provider="Stevebauman\Location\LocationServiceProvider"
```
## Usage

What the package does is add one route and one middleware that handle the locale change.
out of the box it will give you the following options for changing the locale: 

 ```php
http://yourdomain.com/locale/[lang]
```
Linking to that url will change the applications locale to the one that you specified. The ```[lang]``` variable must a valid locale code and must be present in the ```config/languages.php``` configuration file. After the change of locale the route will redirect back with any other input present. 

You can create links that change the locale dynamically my adding a ```?lang=[lang]``` to any route in you application. 

The first time the application starts the middleware will look for a cookie with a preferred locale. If none is found it will geo-locate the user and switch to the configured locale based on country code. 

You can configure all of that from   ```config/languages.php``` as well as cookie name and route format. 

Here is the default full configuration: 

```php
    'cookie_key' => 'current_locale',     
    'locale' => [
        'en' => 'English',
        'de' => 'Deutsche',
        'es' => 'Español',
        'ru' => 'Русский'
    ],
    'country_code_to_locale' => [
        'US' => 'en',
        'GB' => 'en',
        'CA' => 'en',
        'UM' => 'en',
         //spanish
        'ES' => 'es',
         //german
        'DE' => 'de',
         //Russion
        'RU' => 'ru',
    ],    
    'route' => '/locale/{lang}',
    'route_name' => 'setLocale'
```

Hope you like it and helps!

## Credits


- [Daniel Doinov][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/danieldoinov/LanguageIntegration.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/danieldoinov/LanguageIntegration/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/danieldoinov/LanguageIntegration.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/danieldoinov/LanguageIntegration.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/danieldoinov/LanguageIntegration.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/danieldoinov/LanguageIntegration
[link-travis]: https://travis-ci.org/danieldoinov/LanguageIntegration
[link-scrutinizer]: https://scrutinizer-ci.com/g/danieldoinov/LanguageIntegration/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/danieldoinov/LanguageIntegration
[link-downloads]: https://packagist.org/packages/danieldoinov/LanguageIntegration
[link-author]: https://github.com/danieldoinov
[link-contributors]: ../../contributors
