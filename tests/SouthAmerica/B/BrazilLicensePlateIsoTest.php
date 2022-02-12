<?php

use Amex\LicensePlate\BrazilLicensePlate;
use PHPUnit\Framework\TestCase;

class BrazilLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new BrazilLicensePlate('r io 6 f 89');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'BR');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new BrazilLicensePlate('RIO6G89');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'BRA');
    }
}
