<?php

use Amex\LicensePlate\LuxembourgianLicensePlate;
use PHPUnit\Framework\TestCase;

class LuxembourgianLicensePlateSidecodeTest extends TestCase
{
    public function testSidecode1()
    {
        $licenseplate = new LuxembourgianLicensePlate('A1234');
        $this->assertEquals($licenseplate->getSidecode(), 1);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecode2()
    {
        $licenseplate = new LuxembourgianLicensePlate('AA123');
        $this->assertEquals($licenseplate->getSidecode(), 2);
        $this->assertTrue($licenseplate->isValid());
    }

    public function testSidecode3()
    {
        $licenseplate = new LuxembourgianLicensePlate('AA1234');
        $this->assertEquals($licenseplate->getSidecode(), 3);
        $this->assertTrue($licenseplate->isValid());
    }
}
