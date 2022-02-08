<?php

use Amex\LicensePlate\GermanLicensePlate;
use PHPUnit\Framework\TestCase;

class GermanLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new GermanLicensePlate('');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'DE');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new GermanLicensePlate('');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'DEU');
    }
}
