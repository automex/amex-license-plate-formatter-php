<?php

use Amex\LicensePlate\GabonLicensePlate;
use PHPUnit\Framework\TestCase;

class GabonLicensePlateFormatTest extends TestCase
{
    public function testFormatCurrentLicensePlate()
    {
        $licenseplate = new GabonLicensePlate('vv190vv');
        $this->assertEquals($licenseplate->format(), 'VV 190 VV');
        $this->assertTrue($licenseplate->isValid());
    }
    public function testFormatPreCurrentLicensePlate()
    {
        $licenseplate = new GabonLicensePlate('9160g9a');
        $this->assertEquals($licenseplate->format(), '9160 G9A');
        $this->assertTrue($licenseplate->isValid());
    }
    public function testFormatPrePreCurrentLicensePlate()
    {
        $licenseplate = new GabonLicensePlate('347gL3a');
        $this->assertEquals($licenseplate->format(), '347 GL3A');
        $this->assertTrue($licenseplate->isValid());
    }
    public function testFormatCorpsDiplomatiqueLicensePlate()
    {
        $licenseplate = new GabonLicensePlate('123CD45');
        $this->assertEquals($licenseplate->format(), '123 CD 45');
        $this->assertTrue($licenseplate->isValid());
    }
    public function testFormatMilitaryPoliceLicensePlate()
    {    
        $licenseplate = new GabonLicensePlate('123456');
        $this->assertEquals($licenseplate->format(), '123456');
        $this->assertTrue($licenseplate->isValid());
    }
    public function testInvalidLicensePlate()
    {
        $licenseplate = new GabonLicensePlate('thisisnotalicenseplate');
        $this->assertFalse($licenseplate->format());
    }
}
