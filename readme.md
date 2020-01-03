# Breathe

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

BreatheHR API Client for Laravel

## Requirements

Laravel 5.5+

## Installation

Via Composer

``` bash
$ composer require devloft/breathe
```

## Usage

Currently only the following endpoints are available

#### Employees

Get employee details by ID

```
Breathe::employees(123)->get();
```

Return a list of all employees

```
Breathe::employees()->get($page_number, $results_per_page, $type)
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [Samuel Loft](https://github.com/samloft)
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/devloft/breathe.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/devloft/breathe.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/devloft/breathe/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/devloft/breathe
[link-downloads]: https://packagist.org/packages/devloft/breathe
[link-travis]: https://travis-ci.org/devloft/breathe
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/devloft
[link-contributors]: ../../contributors
