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
            ['RG2380', 1],
            ['W u 954', 2],
            ['Abc 298', 4],
            ['LSD 999', false],
            ['SomethingWentWrong', false],
            ['2485R', 5],
            ['G4386', 6],
            ['237 YW', false],
            ['237YK', 7],
            ['K433K', 8],
            ['4K387', 9],
            ['38R92', 10],
            ['298B3', 11],
            ['7 H EB', 12],
            ['38 f gh', 12],
            ['A7 F vk', 13],
            ['fb 3287', 1],
            ['ur 4787', 3],
        ];
    }    
}
