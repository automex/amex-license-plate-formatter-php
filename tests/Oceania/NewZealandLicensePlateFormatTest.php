<?php

use Amex\LicensePlate\NewZealandLicensePlate;
use PHPUnit\Framework\TestCase;

class NewZealandLicensePlateFormatTest extends TestCase
{
    public function testFormatLicensePlatesFrom1964To1996()
    {
        $licenseplate = new NewZealandLicensePlate('rg 2380');
        $this->assertEquals($licenseplate->format(), "RG2380");
        $this->assertTrue($licenseplate->isValid());
    }
    
    public function testFormatLicensePlatesFrom1996To2001()
    {
        $licenseplate = new NewZealandLicensePlate('rg 2380');
        $this->assertEquals($licenseplate->format(), "RG2380");
        $this->assertTrue($licenseplate->isValid());
    }
    
    public function testFormatLicensePlatesFrom2001ToNow()
    {
        $licenseplate = new NewZealandLicensePlate('somethingWentVeryWrong');
        $this->assertFalse($licenseplate->format());
        $this->assertFalse($licenseplate->isValid());
        
        $licenseplate = new NewZealandLicensePlate('Abc 298');
        $this->assertEquals($licenseplate->format(), "ABC298");
        $this->assertTrue($licenseplate->isValid());
    }
    
    public function testSidecodeOne()
    {
        $licenseplate = new NewZealandLicensePlate('wu999');
        $this->assertEquals($licenseplate->format(), 'WU999');
        var_dump($licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }
    public function testSidecodeTwo()
    {  
        $licenseplate = new NewZealandLicensePlate('wu3279');
        $this->assertEquals($licenseplate->format(), 'WU3279');
        var_dump($licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }
    public function testSidecodeThree()
    {    
        $licenseplate = new NewZealandLicensePlate('wK3279');
        $this->assertEquals($licenseplate->format(), 'WK3279');
        var_dump($licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testFormatMotorcycleLicensePlate()
    {    
        $licenseplate = new NewZealandLicensePlate('wk 567');
        $this->assertEquals($licenseplate->format(), 'WK567');
        var_dump($licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }

    public function testFormatTrailerLicensePlate()
    {    
        $licenseplate = new NewZealandLicensePlate('2485 r');
        $this->assertEquals($licenseplate->format(), '2485R');
        var_dump($licenseplate->getSidecode());
        $this->assertTrue($licenseplate->isValid());
    }
}
