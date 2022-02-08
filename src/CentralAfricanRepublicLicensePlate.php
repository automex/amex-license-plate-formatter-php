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
            "CMD" => "/^([\d]{3})(cmd|CMD)([\d]{3})$/",  
            "CD"  => "/^([\d]{3})(cd|CD)([\d]{3})$/",  
            "K"   => "/^([\d]{3})(k|K)([\d]{3})$/",  
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
			case 'CMD':
				return $parts[1] . ' ' . $parts[2] . ' ' . $parts[3];
				break;
			case 'CD':
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
