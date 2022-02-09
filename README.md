# License plate validator and formatter
<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->
[![All Contributors](https://img.shields.io/badge/all_contributors-1-orange.svg?style=flat-square)](#contributors-)
<!-- ALL-CONTRIBUTORS-BADGE:END -->

| CI | Status |
| --- | --- |
| Lint | [![Lint](https://github.com/automex/amex-license-plate-formatter-php/actions/workflows/phplint.yml/badge.svg)](https://github.com/automex/amex-license-plate-formatter-php/actions/workflows/phplint.yml) |
| Coverage | [![Coverage](https://github.com/automex/amex-license-plate-formatter-php/actions/workflows/ci-coverage.yml/badge.svg)](https://github.com/automex/amex-license-plate-formatter-php/actions/workflows/ci-coverage.yml) |
| Tests | [![Tests](https://github.com/automex/amex-license-plate-formatter-php/actions/workflows/ci-php.yml/badge.svg)](https://github.com/automex/amex-license-plate-formatter-php/actions/workflows/ci-php.yml) |

This library can be used to validate and format license plate numbers.

# Countries supported

## Europe
* Belgium (1971-now)
* Finland (1922-now)
* France (1976-now)
* Germany (unknown date-now)
* Italy (1994-now)
* Luxembourg (unknown date-now)
* Netherlands (1951-now)
* Spain (1900-now)
* United Kingdom (1903-now)

## Asia
* Israel (unknown date-now)

## Africa
* Central African Republic (2006 date-now)
* Gabon (1962 date-now)

## More
* More countries will be added in the future

# How to install

Add the following to your composer.json:

``` json
{
    "require": {
        "automex/amex-license-plate-formatter-php": "^1.0.0"
    }
}
```

# How to use

Call the constructor of the license plate class of your choice with the user input as the first parameter:

``` php
<?php
$licenseplate = new \Amex\LicensePlate\DutchLicensePlate('08ttnp');
if($licenseplate->isValid())
{
    echo $licenseplate->format(); // Outputs 08-TT-NP in this case
}
```

Since the license plate classes for each country implement the LicensePlateInterface, they expose isValid() and format() methods.
Country-specific methods may also be available. Please check the code of the specific class to get the complete picture.

Please note that this library does not check if a license plate actually exists, nor does it exclude combinations that aren't allowed.

# License

The code and the documentation are released under the [LPGLv2.1 License](https://github.com/automex/amex-license-plate-formatter-php/blob/main/LICENSE).

## Contributors ✨

Thanks goes to these wonderful people ([emoji key](https://allcontributors.org/docs/en/emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
    <td align="center"><a href="https://patrickgroot.com"><img src="https://avatars.githubusercontent.com/u/6934501?v=4?s=100" width="100px;" alt=""/><br /><sub><b>Patrick Groot</b></sub></a><br /><a href="#infra-pgroot91" title="Infrastructure (Hosting, Build-Tools, etc)">🚇</a> <a href="https://github.com/automex/amex-license-plate-formatter-php/commits?author=pgroot91" title="Tests">⚠️</a> <a href="https://github.com/automex/amex-license-plate-formatter-php/commits?author=pgroot91" title="Code">💻</a></td>
  </tr>
</table>

<!-- markdownlint-restore -->
<!-- prettier-ignore-end -->

<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/all-contributors/all-contributors) specification. Contributions of any kind welcome!