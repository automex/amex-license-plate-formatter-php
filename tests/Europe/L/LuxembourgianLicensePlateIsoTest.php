<?php

use Amex\LicensePlate\LuxembourgianLicensePlate;
use PHPUnit\Framework\TestCase;

class LuxembourgianLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new LuxembourgianLicensePlate('AA999');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'LU');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new LuxembourgianLicensePlate('AA999');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'LUX');
    }
}
