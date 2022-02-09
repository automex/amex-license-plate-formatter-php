<?php

use Amex\LicensePlate\FinnishLicensePlate;
use PHPUnit\Framework\TestCase;

class FinnishLicensePlateSidecodeTest extends TestCase
{
    /**
     * @dataProvider sideCodeDataProvider
     * @param        $licenseplate
     * @param        $expectedSideCode
     */
    public function testGetSidecode($licenseplate, $expectedSideCode)
    {
        $sut = new FinnishLicensePlate($licenseplate);

        $this->assertEquals($expectedSideCode, $sut->getSidecode());
    }
    
    /**
     * @return array
     */
    public function sideCodeDataProvider()
    {
        return [
            ['C63003', 'C'],
            ['CD3902', 'CD'],
            ['h4045', 1],
            ['h447', 1],
            ['t39', 1],
            ['tv441', 2],
            ['KMX51', 3],
            ['VVV995', 4],
            ['10TRF', 8],
            ['KM560', 2],
            ['100EAI', 9],
            ['561ZN', 9],
            ['Ålg743', 11],
            ['Ålg98', 11],
            ['Ål11449', 12],
            ['Ål7435', 10],
            ['Åla4512', 11],
            ['WAW100', 5],
            ['PV5995', 6],            
            ['CDCDCD', false],
        ];
    }    
}
