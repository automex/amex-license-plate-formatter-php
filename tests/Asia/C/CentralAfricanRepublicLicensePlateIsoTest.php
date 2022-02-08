<?php

use Amex\LicensePlate\CentralAfricanRepublicLicensePlate;
use PHPUnit\Framework\TestCase;

class CentralAfricanRepublicLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new CentralAfricanRepublicLicensePlate('123456a');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'CF');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new CentralAfricanRepublicLicensePlate('123456a');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'CAF');
    }
}
