<?php

namespace Amex\LicensePlate;

use Amex\LicensePlate\AbstractLicensePlate;
use Amex\LicensePlate\LicensePlateInterface;

/**
 * Luxembourgian license plate formatted and utilities
 *
 * Class LuxembourgianLicensePlate
 * @package Amex\LicensePlate
 */
class LuxembourgianLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
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
        $licenseplate = strtoupper(str_replace(array('-', ' '), '', $this->licenseplate));
        $sidecodes = array();
		
		// Special sidecodes
		$sidecodes['CD'] = '/^CD[\d]{2,4}$/';                         // CD 5000
			
        // Normal sidecodes
        $sidecodes[1] = '/^[A-Z]{1}[\d]{4}$/';                         // A 5000
        $sidecodes[2] = '/^[A-Z]{2}[\d]{3}$/';                         // AA 999
		$sidecodes[3] = '/^[A-Z]{2}[\d]{4}$/';                         // CD 5000

        return $this->checkPatterns($sidecodes, $licenseplate);
    }

    /**
     * Format the license plate
     *
     * Example: will output 08-TT-NP for input of 08ttnp
     *
     * @param int $sidecode Optional input of sidecode. Automatically determined if omitted
     * @return string Formatted license plate
     */
    public function format($sidecode = 0)
    {
        if ($sidecode === 0) {
            $sidecode = $this->getSidecode();
        }

        if (false === $sidecode) {
            return false;
        }

        $licenseplate = strtoupper(str_replace(array(' ', '-'), '', $this->licenseplate));

        switch ($sidecode) {
			case 'CD':
                if (strlen($licenseplate) < 6) {
                    return 'CD ' . substr($licenseplate, 2);
					break;
                } else {
                    return 'CD ' . substr($licenseplate, 2, 2) . "-" . substr($licenseplate, 4, 2);
					break;
                }
				
            case 1:
                return substr($licenseplate, 0, 1) . ' ' . substr($licenseplate, 1);
                break;

            default: // 2 and 3
				return substr($licenseplate, 0, 2) . ' ' . substr($licenseplate, 2);
			
        }
	}

    /**
     * Tests if the license plate is valid
     * The license plate is valid if the sidecode can be determined
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->getSidecode() != false;
    }

    public function getTwoLetterISO()
    {
        return 'LU';
    }

    public function getThreeLetterISO()
    {
        return 'LUX';
    }
}
