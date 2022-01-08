# A Laravel SSH2 wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/defstudio/ssh-client.svg?style=flat-square)](https://packagist.org/packages/defstudio/ssh-client)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/defstudio/ssh-client/run-tests?label=tests)](https://github.com/defstudio/ssh-client/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/defstudio/ssh-client/Check%20&%20fix%20styling?label=code%20style)](https://github.com/defstudio/ssh-client/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/defstudio/ssh-client.svg?style=flat-square)](https://packagist.org/packages/defstudio/ssh-client)

Ssh is a lightweight ssh client for laravel


## Installation

You can install the package via composer:

```bash
composer require defstudio/ssh-client
```

## Usage

```php
Ssh::host("192.168.1.99")
->port(22)
->username('foo')
->key('rsa:sfsnsdfknsfdi....')
->execute('reboot');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Fabio Ivona](https://github.com/defstudio)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
