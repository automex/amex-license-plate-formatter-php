<?php

namespace Amex\LicensePlate;

use Amex\LicensePlate\AbstractLicensePlate;
use Amex\LicensePlate\LicensePlateInterface;

/**
 * Finnish license plate formatted and utilities
 *
 * Class FinnishLicensePlate
 * @package Amex\LicensePlate
 */
class FinnishLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
    
    // From 1922 to 1972
    protected $regionCodes = [
        'A',
        'B',
        'C',
        'E',
        'F',
        'G',
        'H',
        'I',
        'K',
        'L',
        'M',
        'N', // Until 1961
        'O',
        'R',
        'S',
        'T',
        'U',
        'V', // Originally VA
        'X',
        'Y',
        'Z',
        'ÅL', // Four Digits
    ];

    public function __construct($licensePlate)
    {
        parent::__construct(strtoupper($licensePlate));

        $regionCodesPrefixRegex = "(" . implode("|", $this->regionCodes) . ")";

        $this->sideCodes = [
            "C"  => "/^(C)([\d]{1,5})$/",                                                // Corps diplomatique license plates
            "CD" => "/^(CD)([\d]{2,4})$/",                                               // Judges of the international courts of justice
            1    => "/^(?:(?![pwdåPWDÅ])[a-zA-Z]){1}([1-9]{1}[0-9]{1,3})$/u",            // 1922-1954
            2    => "/^(?:(?![pwdåPWDÅ])[a-zA-Z]){1}([a-zA-Z]{1})([1-9]{1}[0-9]{2})$/u", // 1950-1959
            3    => "/^(?:(?![pwdåPWDÅ])[a-zA-Z]){1}([a-zA-Z]{2})([1-9]{1}[0-9]{1})$/u", // 1960-1971 
            4    => "/^(?:(?![pwdåPWDÅ])[a-zA-Z]){1}([a-zA-Z]{2})([1-9]{1}[0-9]{2})$/u", // 1972-current
            5    => "/^[pwdPWD]{1}[a-zA-Z]{2}[\d]{2,3}$/",   
            6    => "/^[pwdPWD]{1}[a-zA-Z]{1}[\d]{4}$/",
            7    => "/^((?:(?![pwdPWD])[a-zA-Z]){1}[a-zA-Z]{1})[1-9]{1}[0-9]{2}$/",   
            8    => "/^[1-9]{1}[0-9]{1}[a-zA-Z]{3}$/",   
            9    => "/^[1-9]{1}[0-9]{2}[a-zA-Z]{2,3}$/",   
            10   => "/^ÅL[1-9]{1}[0-9]{3}$/u", 
            11   => "/^ÅL[a-zA-Z]{1}[1-9]{1}[0-9]{1,3}$/u", 
            12   => "/^ÅL[1-9]{1}[0-9]{4}$/u" 
        ];
    }

    public function getSidecode()
    {			
        return $this->checkPatterns($this->sideCodes, $this->licenseplate);
    }

    public function format($sidecode = 0)
    {
        if ($sidecode === 0) {
            $sidecode = $this->getSidecode();
        }

        if (false === $sidecode) {
            return false;
        }
            
        $licenseplate = strtoupper(str_replace(array('-', '·', ' '), '', $this->licenseplate));

        switch ($sidecode) {
            case 'C':
                return 'C-' . substr($licenseplate, 1);
            case 'CD':
                return 'CD-' . substr($licenseplate, 2);
            default: 
                return substr($licenseplate, 0, 3) . '-' . substr($licenseplate, 3, 3);
            case 1:
                return substr($licenseplate, 0, 1) . '-' . substr($licenseplate, 1, 4);
            case 6:
                return substr($licenseplate, 0, 2) . '-' . substr($licenseplate, 2, 4);
            case 2:
            case 7:
            case 8:
                return substr($licenseplate, 0, 2) . '-' . substr($licenseplate, 2, 3);
            case 9:
                if(strlen($licenseplate) < 6) {
                    return substr($licenseplate, 0, 3) . '·' . substr($licenseplate, 3, 2);
                } else {
                    return substr($licenseplate, 0, 3) . '·' . substr($licenseplate, 3, 3);
                }
            case 10:
                return substr($licenseplate, 0, 3) . ' ' . substr($licenseplate, 3, 4);
            case 11:
                return substr($licenseplate, 0, 4) . ' ' . substr($licenseplate, 4, 4);
            case 12:
                return substr($licenseplate, 0, 3) . ' ' . substr($licenseplate, 3, 5);
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
        return 'FI';
    }

    public function getThreeLetterISO()
    {
        return 'FIN';
    }
}

?>