<?php

namespace Amex\LicensePlate;

use Amex\LicensePlate\AbstractLicensePlate;
use Amex\LicensePlate\LicensePlateInterface;

/**
 * Brazil license plate formatted and utilities
 *
 * Class BrazilLicensePlate
 *
 * @package Amex\LicensePlate
 */
class BrazilLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
   
    protected $sideCodes = [];

    public function __construct($licensePlate)
    {
        parent::__construct(strtoupper($licensePlate));

        $this->sideCodes = [
            "CD"  => "/^((?=CD)[A-Za-z]{2})([0-9]{4})$/ui",                  // Corps diplomatic.
            "CC"  => "/^((?=CC)[A-Za-z]{2})([0-9]{4})$/ui",                  // Corps consular.
            "MBR" => "/^((?=MBR)[A-Za-z]{3})([0-9]{4})$/ui",                 // New diplomatic plates.
            1     => "/^([A-Za-z]{3})([0-9]{4})$/ui",                        // 1990 - 2019 LLL####
            2     => "/^([A-Za-z]{3})([0-9]{1})([a-zA-Z]{1})([0-9]{2})$/ui", // 2019 - now  LLL#L##
        ];
    }

    public function getSidecode()
    {            
        return $this->checkPatterns($this->sideCodes, $this->licenseplate);
    }

    public function format($sideCode = 0)
    {
        if ($sideCode === 0) {
            $sideCode = $this->getSidecode();
        }

        if (false === $sideCode) {
            return false;
        }

        $parts = [];
        preg_match($this->sideCodes[$sideCode], $this->licenseplate, $parts);

        switch ($sideCode) {
            case 1:
                return $parts[1] . ' · ' . $parts[2];
                break;
            case 2:
                return $parts[1] . '' . $parts[2] . '' . $parts[3] . '' . $parts[4];
                break;
            default:
                return $parts[1] . '' . $parts[2];
            break;
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
        return $this->getSidecode() !== false;
    }

    public function getTwoLetterISO()
    {
        return 'BR';
    }

    public function getThreeLetterISO()
    {
        return 'BRA';
    }
}

?>
