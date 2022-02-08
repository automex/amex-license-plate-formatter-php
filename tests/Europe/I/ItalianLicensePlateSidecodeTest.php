<?php

use Amex\LicensePlate\ItalianLicensePlate;
use PHPUnit\Framework\TestCase;

class ItalianLicensePlateSidecodeTest extends TestCase
{
    /**
     * @param        $licenseplate
     * @param        $expectedSidecode
     * @dataProvider sidecodeDataProvider
     */
    public function testGetSidecode($licenseplate, $expectedSidecode)
    {
        $sut = new ItalianLicensePlate($licenseplate);

        $this->assertEquals(
            $expectedSidecode,
            $sut->getSidecode(),
        );
    }

    public function sidecodeDataProvider()
    {
        return [
            ['AA123AA', 1],
            ['AQ123AA', false],
            ['A123AA', false],
            ['AA1234AA', false],
            ['BG963AD', 1]
        ];
    }
}
