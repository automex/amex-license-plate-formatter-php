<?php

use Amex\LicensePlate\FrenchLicensePlate;
use PHPUnit\Framework\TestCase;

class FrenchLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new FrenchLicensePlate('99XX99');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'FR');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new FrenchLicensePlate('99XX99');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'FRA');
    }
}
