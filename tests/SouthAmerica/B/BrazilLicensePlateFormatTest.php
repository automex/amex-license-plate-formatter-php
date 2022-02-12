<?php

use Amex\LicensePlate\BrazilLicensePlate;
use PHPUnit\Framework\TestCase;

class BrazilLicensePlateFormatTest extends TestCase
{
    // Special plates eg corps diplomatic
    public function testFormatLicensePlateCorpsDiplomatique()
    {
        $licenseplate = new BrazilLicensePlate('cd 43 97');
        $this->assertEquals($licenseplate->format(), "CD4397");
        $this->assertTrue($licenseplate->isValid());
    }

    // Registro Nacional de Veículos Automotores (RENAVAM).
    public function testFormatLicensePlatesFrom1990To2019()
    {
        $licenseplate = new BrazilLicensePlate('rio 4397');
        $this->assertEquals($licenseplate->format(), "RIO · 4397");
        $this->assertTrue($licenseplate->isValid());
    }
    
    // Mercosul 
    public function testFormatLicensePlatesFrom2019ToNow()
    {
        $licenseplate = new BrazilLicensePlate('r io 6 f 89');
        $this->assertEquals($licenseplate->format(), "RIO6F89");
        $this->assertTrue($licenseplate->isValid());
    }

    // Invalid License Plate
    public function testFormatLicensePlateFalse()
    {
        $licenseplate = new BrazilLicensePlate('OopsSomethingWentWrong');
        $this->assertEquals($licenseplate->format(), false);
        $this->assertFalse($licenseplate->isValid());
    }

}
