# Generate image from url

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tohidhabiby/htmltoimage.svg?style=flat-square)](https://packagist.org/packages/tohidhabiby/htmltoimage)
[![Build Status](https://img.shields.io/travis/tohidhabiby/htmltoimage/master.svg?style=flat-square)](https://travis-ci.org/tohidhabiby/htmltoimage)
[![Quality Score](https://img.shields.io/scrutinizer/g/tohidhabiby/htmltoimage.svg?style=flat-square)](https://scrutinizer-ci.com/g/tohidhabiby/htmltoimage)
[![Total Downloads](https://img.shields.io/packagist/dt/tohidhabiby/htmltoimage.svg?style=flat-square)](https://packagist.org/packages/tohidhabiby/htmltoimage)

This package uses wkhtmltoimage software, so you should install this software on your server.

## Installation

You can install the package via composer:

```bash
composer require tohidhabiby/htmltoimage
```

## Usage
Use this code and set variables then you will have an image in your path.

``` php
use Tohidhabiby\HtmlToImage\HtmlToImage;

$htmlToImage = new HtmlToImage();
$htmlToImage->url($url)
    ->path($path)
    ->cropHeight($height) // optonal Set height for cropping
    ->cropWidth($width) // optonal Set width for cropping
    ->coordinateX($x) // optonal Set x coordinate for cropping
    ->coordinateY($y) // optonal Set y coordinate for cropping
    ->generate();
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [tohihabiby](https://github.com/tohidhabiby)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).
