# Filasortable reorderable drag-and-drop.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ibrahimbougaoua/filasortable.svg?style=flat-square)](https://packagist.org/packages/ibrahimbougaoua/filasortable)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ibrahimbougaoua/filasortable/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ibrahimbougaoua/filasortable/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ibrahimbougaoua/filasortable/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ibrahimbougaoua/filasortable/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ibrahimbougaoua/filasortable.svg?style=flat-square)](https://packagist.org/packages/ibrahimbougaoua/filasortable)

Filasortable package for reorderable drag-and-drop table for modern browsers and touch devices, just register the plugin  <br />after that you will see new button appear at the header of table where you can enable and disable the sort option for the current table.

<a href="https://www.youtube.com/@IbrahimBougaoua" target="_blank">Explanation At Youtube</a>
## Just press the enable button and enjoy.

<br />

[<img src="https://raw.githubusercontent.com/ibrahimBougaoua/filasortable/refs/heads/main/screens/normal.png">](https://www.youtube.com/@IbrahimBougaoua)

<br />

[<img src="https://raw.githubusercontent.com/ibrahimBougaoua/filasortable/refs/heads/main/screens/enabled.png">](https://www.youtube.com/@IbrahimBougaoua)

<br />

[<img src="https://raw.githubusercontent.com/ibrahimBougaoua/filasortable/refs/heads/main/screens/disabled.png">](https://www.youtube.com/@IbrahimBougaoua)

## Installation

You can install the package via composer:

```bash
composer require ibrahimbougaoua/filasortable
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filasortable-views"
```

## Usage

Register the plugin after that you will see new button appear at the header of table where you can enable and disable the sort option for the current table.

```php
use IbrahimBougaoua\FilaSortable\FilaSortablePlugin;

->plugins([
    FilaSortablePlugin::make()
]);
```

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ibrahim Bougaoua](https://github.com/IbrahimBougaoua)
- [SortableJS](https://github.com/SortableJS/Sortable)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
