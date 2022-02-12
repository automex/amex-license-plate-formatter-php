<?php

use Amex\LicensePlate\BrazilLicensePlate;
use PHPUnit\Framework\TestCase;

class BrazilLicensePlateSidecodeTest extends TestCase
{
    /**
     * @dataProvider sideCodeDataProvider
     * @param        $licenseplate
     * @param        $expectedSideCode
     */
    public function testGetSidecode($licenseplate, $expectedSideCode)
    {
        $sut = new BrazilLicensePlate($licenseplate);
        $this->assertEquals($expectedSideCode, $sut->getSidecode());
    }
    
    /**
     * @return array
     */
    public function sideCodeDataProvider()
    {
        return [
            ['c d 43 97', 'CD'],
            ['rio 4397', 1],
            ['r io 6 f 89', 2],
            ['SomethingWentWrong', false],
        ];
    }    
}
