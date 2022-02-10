<?php

use Amex\LicensePlate\NewZealandLicensePlate;
use PHPUnit\Framework\TestCase;

class NewZealandLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new NewZealandLicensePlate('bb534dg');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'NZ');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new NewZealandLicensePlate('bb534dg');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'NZL');
    }
}
