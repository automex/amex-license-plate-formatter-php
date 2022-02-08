<?php

use Amex\LicensePlate\DutchLicensePlate;
use PHPUnit\Framework\TestCase;

class DutchLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new DutchLicensePlate('9abc99');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'NL');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new DutchLicensePlate('9abc99');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'NLD');
    }
}
