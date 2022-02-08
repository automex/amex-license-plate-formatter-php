<?php

use Amex\LicensePlate\BelgianLicensePlate;
use PHPUnit\Framework\TestCase;

class BelgianLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new BelgianLicensePlate('999XXX');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'BE');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new BelgianLicensePlate('999XXX');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'BEL');
    }
}
