<?php

use Amex\LicensePlate\CentralAfricanRepublicLicensePlate;
use PHPUnit\Framework\TestCase;

class CentralAfricanRepublicLicensePlateFormatTest extends TestCase
{
    public function testFormat()
	{
        $licenseplate = new CentralAfricanRepublicLicensePlate('ta123bv');
        $this->assertEquals($licenseplate->format(), "TA 123 BV");
		$this->assertTrue($licenseplate->isValid());
	}
}
