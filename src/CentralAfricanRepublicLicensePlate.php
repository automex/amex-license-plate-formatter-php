<?php

namespace Amex\LicensePlate;

use Amex\LicensePlate\AbstractLicensePlate;
use Amex\LicensePlate\LicensePlateInterface;

/**
 * Central African Republic license plate formatted and utilities
 *
 * Class CentralAfricanRepublicLicensePlate
 *
 * @package Amex\LicensePlate
 */
class CentralAfricanRepublicLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
    protected $regionCodes = [
        'BB', // Bamingui-Bangoran
        'BG', // Bangui
        'BK', // Basse-Kotto
        'HB', // Haut-Mbomou
        'HK', // Haute-Kotto
        'KG', // Kémo
        'LB', // Lobaye
        'MB', // Mbomou
        'MK', // Mambéré-Kadéï
        'MP', // Ombella-M'Poko
        'NG', // Nana-Grébizi
        'SE', // Sangha-Mbaéré
        'UA', // Ouham
        'UK', // Ouaka
        'UP', // Ouham-Pendé
        'VK', // Vakaga
    ];

    protected $sideCodes = [];

    public function __construct($licensePlate)
    {
        parent::__construct(strtoupper($licensePlate));

        $regionCodesPrefixRegex = "(" . implode("|", $this->regionCodes) . ")";

        $this->sideCodes = [
			1 => "/^([\d]{3})(([a-zA-Z]{3})([\d]{3})$/",
			2 => "/^([\d]{3})([a-zA-Z]{2})([\d]{3})$/",
            3 => "/^([\d]{3})([a-zA-Z]{1})([\d]{3})$/",
            4 => "/^([\d]{3})([a-zA-Z]{3})([\d]{3})$/",
			5 => "/^TA([\d]{3})({$regionCodesPrefixRegex})$/u"
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
				return $parts[1] . ' ' . $parts[2];
                break;
			case 5:
				return $parts[1] . ' ' . $parts[2] . ' ' . $parts[3];
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
        return 'CF';
    }

    public function getThreeLetterISO()
    {
        return 'CAF';
    }
}

?>
