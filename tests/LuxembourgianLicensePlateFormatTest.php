<?php

use Amex\LicensePlate\LuxembourgianLicensePlate;
use PHPUnit\Framework\TestCase;

class LuxembourgianLicensePlateFormatTest extends TestCase
{
    public function testFormat()
    {
        $licenseplate = new LuxembourgianLicensePlate('A1234');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'A 1234');

        $licenseplate = new LuxembourgianLicensePlate('AB123');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'AB 123');

        $licenseplate = new LuxembourgianLicensePlate('AB1234');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'AB 1234');
        
        $licenseplate = new LuxembourgianLicensePlate('thisisnotalicenseplate');
        $this->assertFalse($licenseplate->format());
    }
    
    public function testLuxembourgianDiplomaticLicensePlateShort()
    {
        $licenseplate = new LuxembourgianLicensePlate('cd21');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'CD 21');
    }
    
    public function testLuxembourgianDiplomaticLicensePlate()
    {
        $licenseplate = new LuxembourgianLicensePlate('cd7733');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'CD 77-33');
    }
}
