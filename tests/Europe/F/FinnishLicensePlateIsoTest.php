<?php

use Amex\LicensePlate\FinnishLicensePlate;
use PHPUnit\Framework\TestCase;

class FinnishLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new FinnishLicensePlate('C63003');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'FI');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new FinnishLicensePlate('CD3902');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'FIN');
    }
}
