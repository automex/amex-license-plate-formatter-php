<?php

use Amex\LicensePlate\GabonLicensePlate;
use PHPUnit\Framework\TestCase;

class GabonLicensePlateSidecodeTest extends TestCase
{
    /**
     * @dataProvider sideCodeDataProvider
     * @param        $licenseplate
     * @param        $expectedSideCode
     */
    public function testGetSidecode($licenseplate, $expectedSideCode)
    {
        $sut = new GabonLicensePlate($licenseplate);
        $this->assertEquals($expectedSideCode, $sut->getSidecode());
    }
    
    /**
     * @return array
     */
    public function sideCodeDataProvider()
    {
        return [
            ['123CD45', 'CD'],
            ['123456', 'MT'], 
            ['vv190vv', 3], 
            ['9160g9a', 2], 
            ['347gL3a', 1], 
            ['somethingisteriblywrong', false],
        ];
    }    
}
