<?php

use Amex\LicensePlate\FinnishLicensePlate;
use PHPUnit\Framework\TestCase;

class FinnishLicensePlateFormatTest extends TestCase
{
    public function testFormatNonDiplomatiqueEmbassyStaffLicensePlates()
    {
        $licenseplate = new FinnishLicensePlate('C63003');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'C-63003');
    }
    public function testFormatCorpsDiplomatiqueLicensePlates()
    {
        $licenseplate = new FinnishLicensePlate('CD3902');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'CD-3902');
    } 
    
    public function testFormatLicensePlateFrom1922To1954()
    {    
        $licenseplate = new FinnishLicensePlate('h4045');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'H-4045');
        
        $licenseplate = new FinnishLicensePlate('h447');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'H-447');
        
        $licenseplate = new FinnishLicensePlate('t39');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'T-39');
    }
    
    public function testFormatLicensePlateFrom1950To1959()
    {    
        $licenseplate = new FinnishLicensePlate('tv441');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'TV-441');
    }
    
    public function testFormatLicensePlateFrom1960To1971()
    {    
        $licenseplate = new FinnishLicensePlate('KMX51');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'KMX-51');
    }

    public function testFormatLicensePlateFrom1972ToCurrent()
    {    
        $licenseplate = new FinnishLicensePlate('VVV995');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'VVV-995');
    }
    
    public function testFormatMotorcycleLicensePlates()
    {
        $licenseplate = new FinnishLicensePlate('10TRF');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '10-TRF', $licenseplate->format());
        
        $licenseplate = new FinnishLicensePlate('KM560');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'KM-560', $licenseplate->format());
    }
    
    public function testFormatWorkVehicleLicensePlate()
    {    
        $licenseplate = new FinnishLicensePlate('100EAI');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '100·EAI', $licenseplate->format() . "doesn't match expected result of '100·EAI'");
    }
    public function testFormatWorkVehicleShortLicensePlate()
    {    
        $licenseplate = new FinnishLicensePlate('561ZN');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), '561·ZN', $licenseplate->format() . "doesn't match expected result of '561·ZN'");
    }
    
    public function testFormatAlandLicensePlate()
    {
        $licenseplate = new FinnishLicensePlate('Ålg743');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'ÅLG 743', $licenseplate->format() . "doesn't match expected result of 'ÅLG 743'");
        
        $licenseplate = new FinnishLicensePlate('Ålg98');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'ÅLG 98', $licenseplate->format() . "doesn't match expected result of 'ÅLG 98'");
        
        $licenseplate = new FinnishLicensePlate('Ål11449');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'ÅL 11449', $licenseplate->format() . "doesn't match expected result of 'ÅL 11449'");
        
        $licenseplate = new FinnishLicensePlate('Ål7435');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'ÅL 7435', $licenseplate->format() . "doesn't match expected result of 'ÅL 7435'");
        
        $licenseplate = new FinnishLicensePlate('Åla4512');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'ÅLA 4512', $licenseplate->format() . "doesn't match expected result of 'ÅLA 4512'");
    }
    
    public function testFormatTrailerLicensePlate()
    {
        $licenseplate = new FinnishLicensePlate('WAW100');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'WAW-100', $licenseplate->format() . "doesn't match expected result of 'WAW-100'");
    }
    public function testFormatTrailerOldLicensePlate()
    {
        $licenseplate = new FinnishLicensePlate('PV5995');
        $this->assertTrue($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), 'PV-5995', $licenseplate->format() . "doesn't match expected result of 'PV-5995'");
    }
    
    public function testFormatInvalidLicensePlate()
    {
        $licenseplate = new FinnishLicensePlate('CDCDCD');
        $this->assertFalse($licenseplate->isValid());
        $this->assertEquals($licenseplate->format(), false);
    }
    
}
