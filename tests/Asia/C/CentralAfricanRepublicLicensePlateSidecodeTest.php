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
            //['123СMD456', 'CMD'],
            //['123СD456', 'CD'],
            ['123K456', 'K'], 
        ];
    }    
}
