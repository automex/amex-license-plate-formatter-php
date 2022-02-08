<?php

use Amex\LicensePlate\SpanishLicensePlate;
use PHPUnit\Framework\TestCase;

class SpanishLicensePlateIsoTest extends TestCase
{
    public function testTwoLetterIso()
    {
        $licenseplate = new SpanishLicensePlate('tEg12345');
        $this->assertEquals($licenseplate->getTwoLetterISO(), 'ES');
    }

    public function testThreeLetterIso()
    {
        $licenseplate = new SpanishLicensePlate('tEg12345');
        $this->assertEquals($licenseplate->getThreeLetterISO(), 'ESP');
    }
}
