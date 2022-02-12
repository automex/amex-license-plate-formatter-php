<?php

use Amex\LicensePlate\BrazilLicensePlate;
use PHPUnit\Framework\TestCase;

class BrazilLicensePlateFormatTest extends TestCase
{
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

}
