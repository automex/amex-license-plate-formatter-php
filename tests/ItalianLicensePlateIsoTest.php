<?php

use Amex\LicensePlate\ItalianLicensePlate;
use PHPUnit\Framework\TestCase;

class ItalianLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new ItalianLicensePlate('AA123AA');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'IT');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new ItalianLicensePlate('AA123AA');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'ITA');
    }
}
