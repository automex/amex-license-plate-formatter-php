<?php

use Amex\LicensePlate\GabonLicensePlate;
use PHPUnit\Framework\TestCase;

class GabonLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new GabonLicensePlate('9160g9a');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'GA');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new GabonLicensePlate('9160g9a');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'GAB');
    }
}
