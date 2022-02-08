# License plate validator and formatter

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
