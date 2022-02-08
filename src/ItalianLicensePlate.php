<?php

namespace Amex\LicensePlate;

use Amex\LicensePlate\AbstractLicensePlate;
use Amex\LicensePlate\LicensePlateInterface;

/**
 * Italian license plate formatted and utilities
 *
 * Class ItalianLicensePlate
 * @package Amex\LicensePlate
 */
class ItalianLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
	
	/**
     * Get the sidecode of the license plate
     *
     * More info: http://nl.wikipedia.org/wiki/Nederlands_kenteken#Alle_sidecodes (in Dutch)
     *
     * @return bool|int|string
     */
    public function getSidecode()
    {
        $licenseplate = strtoupper(str_replace('-', '', $this->licenseplate));
        $sidecodes = array();

        // Normal sidecodes
        $sidecodes[1] = '/^[ABCDEFGHJKLMNPRSTVWXYZ]{2}[\d]{3}[ABCDEFGHJKLMNPRSTVWXYZ]{2}$/'; // 1994 - now

        return $this->checkPatterns($sidecodes, $licenseplate);
    }

    public function format($sidecode = 0)
    {
		if ($sidecode === 0) {
            $sidecode = $this->getSidecode();
        }

        if (false === $sidecode) {
            return false;
        }

        $licenseplate = strtoupper(str_replace('-', '', $this->licenseplate));
		
		switch ($sidecode) {
            default:
                return substr($licenseplate, 0, 2) . '-' . substr($licenseplate, 2, 3) . '-' .	substr($licenseplate, 5, 2);
        }
  
    }

    public function isValid()
    {
        return $this->getSidecode() != false;
    }

    /** Country codes as per https://en.wikipedia.org/wiki/ISO_3166-1#Current_codes */
    public function getTwoLetterISO()
    {
        return 'IT';
    }

    public function getThreeLetterISO()
    {
        return 'ITA';
    }
}