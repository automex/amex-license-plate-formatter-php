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

        // TODO fix sidecode 1-3 exceptions

        $licenseplate = new NewZealandLicensePlate('W u 954');
        $this->assertEquals($licenseplate->format(), "WU954");
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

    public function testFormatTrailerLicensePlate()
    {    
        $licenseplate = new NewZealandLicensePlate('2485 r');
        $this->assertEquals($licenseplate->format(), '2485R');
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new NewZealandLicensePlate('g  4386');
        $this->assertEquals($licenseplate->format(), 'G4386');
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new NewZealandLicensePlate('237 YW');
        $this->assertEquals($licenseplate->format(), false);
        $this->assertFalse($licenseplate->isValid());

        $licenseplate = new NewZealandLicensePlate('237 yK');
        $this->assertEquals($licenseplate->format(), '237YK');
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new NewZealandLicensePlate('k  433 k');
        $this->assertEquals($licenseplate->format(), 'K433K');
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new NewZealandLicensePlate('4 K 387');
        $this->assertEquals($licenseplate->format(), '4K387');
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new NewZealandLicensePlate('38 R 92');
        $this->assertEquals($licenseplate->format(), '38R92');
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new NewZealandLicensePlate('298 B 3');
        $this->assertEquals($licenseplate->format(), '298B3');
        $this->assertTrue($licenseplate->isValid());
    }

    public function testFormatMotorcycleLicensePlate()
    {    
        $licenseplate = new NewZealandLicensePlate('7 H EB');
        $this->assertEquals($licenseplate->format(), '7HEB');
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new NewZealandLicensePlate('38 f gh');
        $this->assertEquals($licenseplate->format(), '38FGH');
        $this->assertTrue($licenseplate->isValid());

        $licenseplate = new NewZealandLicensePlate('A7 F vk');
        $this->assertEquals($licenseplate->format(), 'A7FVK');
        $this->assertTrue($licenseplate->isValid());
    }
}
