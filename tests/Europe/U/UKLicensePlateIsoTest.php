<?php

use Amex\LicensePlate\UKLicensePlate;
use PHPUnit\Framework\TestCase;

class UKLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new UKLicensePlate('tEg12345');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'GB');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new UKLicensePlate('tEg12345');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'GBR');
    }
}
