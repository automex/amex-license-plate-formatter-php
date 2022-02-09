<?php

use Amex\LicensePlate\CentralAfricanRepublicLicensePlate;
use PHPUnit\Framework\TestCase;

class CentralAfricanRepublicLicensePlateFormatTest extends TestCase
{
    public function testFormatTemporaryLicensePlates()
    {
        $licenseplate = new CentralAfricanRepublicLicensePlate('ta123bb');
        $this->assertEquals($licenseplate->format(), "TA 123 BB");
        $this->assertTrue($licenseplate->isValid());
        
        $licenseplate = new CentralAfricanRepublicLicensePlate('TF3364BB');
        $this->assertEquals($licenseplate->format(), "TF 3364 BB");
        $this->assertTrue($licenseplate->isValid());
    }
    
    public function testFormatHeadOfDiplomaticMissionOrRepresentativeInternationalOrganizationLicensePlate()
    {
        $licenseplate = new CentralAfricanRepublicLicensePlate('123cmd112');
        $this->assertEquals($licenseplate->format(), "123 CMD 112");
        $this->assertTrue($licenseplate->isValid());
    }
    
    public function testFormatCorpsDiplomatiqueLicensePlate()
    {
        $licenseplate = new CentralAfricanRepublicLicensePlate('123cd112');
        $this->assertEquals($licenseplate->format(), "123 CD 112");
        $this->assertTrue($licenseplate->isValid());
    }
    
    public function testFormatDiplomaticAdministrativeAndTechnicalStaffLicensePlate()
    {
        $licenseplate = new CentralAfricanRepublicLicensePlate('123k112');
        $this->assertEquals($licenseplate->format(), "123 K 112");
        $this->assertTrue($licenseplate->isValid());
    }
    
    public function testFormatPrivateIndividualsLicensePlate()
    {
        $licenseplate = new CentralAfricanRepublicLicensePlate('DF364BB');
        $this->assertEquals($licenseplate->format(), "DF 364 BB");
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new CentralAfricanRepublicLicensePlate('uz 364 bB');
        $this->assertEquals($licenseplate->format(), "UZ 364 BB");
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new CentralAfricanRepublicLicensePlate('aZ 364 bB');
        $this->assertFalse($licenseplate->format());
    }
    
    public function testformatAgriculturalLicensePlates()
    {
        $licenseplate = new CentralAfricanRepublicLicensePlate('zZ 463abg');
        $this->assertEquals($licenseplate->format(), "ZZ 463 ABG");
        $this->assertTrue($licenseplate->isValid());
        
        $licenseplate = new CentralAfricanRepublicLicensePlate('ZZ334BB');
        $this->assertEquals($licenseplate->format(), "ZZ 334 BB");
        $this->assertTrue($licenseplate->isValid());
    }
}
