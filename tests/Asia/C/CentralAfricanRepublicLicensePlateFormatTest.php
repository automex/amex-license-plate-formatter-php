<?php

use Amex\LicensePlate\CentralAfricanRepublicLicensePlate;
use PHPUnit\Framework\TestCase;

class CentralAfricanRepublicLicensePlateFormatTest extends TestCase
{
    public function testFormatCorpsDiplomatiqueLicensePlate()
    {
        $licenseplate = new CentralAfricanRepublicLicensePlate("123СD456");
        //$this->assertEquals($licenseplate->format(), "123 СD 456");
		var_dump($licenseplate->isValid());
        //$this->assertTrue($licenseplate->isValid());
    }
    public function testFormatDiplomatiqueAmbassadorsLicensePlate()
    {    
        $licenseplate = new CentralAfricanRepublicLicensePlate("123СMD456");
        //$this->assertEquals($licenseplate->format(), "123 СMD 456");
		var_dump($licenseplate->isValid());
        //$this->assertTrue($licenseplate->isValid());
    }
	public function testFormatDiplomatiqueConsularStaffLicensePlate()
    {    
        $licenseplate = new CentralAfricanRepublicLicensePlate("123k456");
        $this->assertEquals($licenseplate->format(), "123 K 456");
		var_dump($licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }
    public function testInvalidLicensePlate()
    {
        $licenseplate = new CentralAfricanRepublicLicensePlate('thisisnotalicenseplate');
        $this->assertFalse($licenseplate->format());
    }
}
