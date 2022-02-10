<?php

use Amex\LicensePlate\NewZealandLicensePlate;
use PHPUnit\Framework\TestCase;

class NewZealandLicensePlateSidecodeTest extends TestCase
{
    /**
     * @dataProvider sideCodeDataProvider
     * @param        $licenseplate
     * @param        $expectedSideCode
     */
    public function testGetSidecode($licenseplate, $expectedSideCode)
    {
        $sut = new NewZealandLicensePlate($licenseplate);
        $this->assertEquals($expectedSideCode, $sut->getSidecode());
    }
    
    /**
     * @return array
     */
    public function sideCodeDataProvider()
    {
        return [
            ['YU364BB', false],
            ['SomethingWentWrong', false],
        ];
    }    
}
