<?php

namespace Amex\LicensePlate;

use Amex\LicensePlate\AbstractLicensePlate;
use Amex\LicensePlate\LicensePlateInterface;

/**
 * Gabon license plate formatted and utilities
 *
 * Class GabonLicensePlate
 *
 * @package Amex\LicensePlate
 */
class GabonLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
    // This is just a guess 1962-1989
    protected $regionCodesOld = [
        'GL1', // Estuaire
        'GL2', // Upper Ogooue
        'GL3', // Average Ogooue
        'GL4', // Gouna
        'GL5', // Nyanha
        'GL6', // Ogooue-Ivindo
        'GL7', // Ogooue-Lolo
        'GL8', // Seaside Ogove
        'GL9', // Will-Ntem
    ];
    
    // 1989-2013
    protected $regionCodes = [
        'G1', // Estuaire
        'G2', // Upper Ogooue
        'G3', // Average Ogooue
        'G4', // Gouna
        'G5', // Nyanha
        'G6', // Ogooue-Ivindo
        'G7', // Ogooue-Lolo
        'G8', // Seaside Ogove
        'G9', // Will-Ntem
    ];

    protected $sideCodes = [];

    public function __construct($licensePlate)
    {
        parent::__construct(strtoupper($licensePlate));

        $regionCodesPrefixRegex = "(" . implode("|", $this->regionCodes) . ")";
        $regionCodesOldPrefixRegex = "(" . implode("|", $this->regionCodesOld) . ")";

        $this->sideCodes = [
            "CD" => "/^([\d]{3})(CD)([\d]{2})$/",                                // Corps diplomatique license plates
            "MT" => "/^([\d]{6})$/",                                             // Military Police
            1    => "/^([\d]{2,3}){$regionCodesOldPrefixRegex}([a-zA-Z]{1})$/u", // 1962-1989
            2    => "/^([\d]{4}){$regionCodesPrefixRegex}([a-zA-Z]{1})$/u",      // 1989-2013
            3    => "/^([a-zA-Z]{2})([\d]{3})([a-zA-Z]{2})$/u",                  // 2013-current 
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
        case 'CD':
            return $parts[1] . ' ' . $parts[2] . ' ' . $parts[3];
        break;
        case 'MT':
            return $parts[1];
        break;
        case 1:
        case 2:
            return $parts[1] . ' ' . $parts[2] . '' . $parts[3];
        break;
        default:
            return $parts[1] . ' ' . $parts[2] . ' ' . $parts[3];
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
        return 'GA';
    }

    public function getThreeLetterISO()
    {
        return 'GAB';
    }
}

?>
