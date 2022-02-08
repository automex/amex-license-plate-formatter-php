<?php

use Amex\LicensePlate\IsraeliLicensePlate;
use PHPUnit\Framework\TestCase;

class IsraeliLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new IsraeliLicensePlate('123456a');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'IL');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new IsraeliLicensePlate('123456a');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'ISR');
    }
}
