<?php
    
use Amex\LicensePlate\ItalianLicensePlate;
use PHPUnit\Framework\TestCase;

class ItalianLicensePlateFormatTest extends TestCase
{
    /**
     * @param        $licenseplate
     * @param        $expectedOutput
     * @dataProvider sidecodeDataProvider
     */
    public function testGetSidecode($licenseplate, $expectedOutput)
    {
        $sut = new ItalianLicensePlate($licenseplate);

        $this->assertEquals(
            $expectedOutput,
            $sut->format()
        );
    }

    public function sidecodeDataProvider()
    {
        return [
            ['AA123AA', 'AA-123-AA'],
            ['BG963AD', 'BG-963-AD'],
        ['111111111', false]
        ];
    }
    
    public function testLicensePlateIsValid()
    {
        $licenseplate = new ItalianLicensePlate('AA123AA');
        $this->assertTrue($licenseplate->isValid());
    }
    
    public function testLicensePlateIsInvalid()
    {
        $licenseplate = new ItalianLicensePlate('111111111');
        $this->assertFalse($licenseplate->isValid());
    }
}
