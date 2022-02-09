<?php

use Amex\LicensePlate\CentralAfricanRepublicLicensePlate;
use PHPUnit\Framework\TestCase;

class CentralAfricanRepublicLicensePlateSidecodeTest extends TestCase
{
    /**
     * @dataProvider sideCodeDataProvider
     * @param        $licenseplate
     * @param        $expectedSideCode
     */
    public function testGetSidecode($licenseplate, $expectedSideCode)
    {
        $sut = new CentralAfricanRepublicLicensePlate($licenseplate);
        $this->assertEquals($expectedSideCode, $sut->getSidecode());
    }
    
    /**
     * @return array
     */
    public function sideCodeDataProvider()
    {
        return [
            ['DF364BB', 1],
            ['YU364BB', false],
            ['TF3364BB', 'T'],
            ['ta123bb', 'T'], 
            ['123k112', 'K'], 
            ['123cd112', 'CD'], 
            ['y Y 235 BG', 'YY'], 
            ['wV 235 BG', 'WV'], 
            ['Ww 235 BG', 'WW'], 
            ['123cmd112', 'CMD'], 
            ['zZ 463abg', 'ZZ'], 
            ['ZZ334bb', 'ZZ'], 
            ['123', false], 
        ];
    }    
}
