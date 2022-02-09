<?php

namespace Amex\LicensePlate;

use Amex\LicensePlate\AbstractLicensePlate;
use Amex\LicensePlate\LicensePlateInterface;

/**
 * Central African Republic license plate formatted and utilities.
 *
 * Class CentralAfricanRepublicLicensePlate.
 *
 * @package Amex\LicensePlate.
 */
class CentralAfricanRepublicLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
    protected $regionCodes = [
        'BB', // Bamingui-Bangoran.
        'BG', // Bangui.
        'BK', // Basse-Kotto.
        'HB', // Haut-Mbomou.
        'HK', // Haute-Kotto.
        'KG', // Kémo.
        'LB', // Lobaye.
        'MB', // Mbomou.
        'MK', // Mambéré-Kadéï.
        'MP', // Ombella-M'Poko.
        'NG', // Nana-Grébizi.
        'SE', // Sangha-Mbaéré.
        'UA', // Ouham.
        'UK', // Ouaka.
        'UP', // Ouham-Pendé.
        'VK', // Vakaga.
    ];

    protected $sideCodes = [];

    public function __construct($licensePlate)
    {
        parent::__construct(strtoupper($licensePlate));

        $regionCodePrefixRegex = "(" . implode("|", $this->regionCodes) . ")";

        /**
         * Some information related to the sidecodes and licenseplates from central african republic.
         *
         * WW - Garage service plates
         * WV - Plant vehicle plates
         * YY - Special gear plates
         * ZZ - Agricultural plates / End of plates A = administration - BG = regio. Privately owned doesn't have the A.
         *
         * T - Temporary license plates. Date currently not included 06/06 = June 2006.
         * CMD - For the official vehicle of the Head of Diplomatic Mission and Representative of international organizations.
         * CD - For the service vehicles of diplomatic missions and international organizations, as well as the personal vehicles of diplomatic agents and civil servants of international organizations holding a diplomatic passport or a United Nations laissez-passer.
         * CMC - For the service vehicles of career consular Heads of Mission.
         * CC - For consular post vehicles, as well as the personal vehicles of career consular officers.
         * K - For vehicles of administrative and technical staff of diplomatic missions, international organizations and holders of a service passport.
         *
         * More info: https://en.wikipedia.org/wiki/Vehicle_registration_plates_of_the_Central_African_Republic
         *
         * @return bool|int|string
         */
        $this->sideCodes = [
           'T'   => "/^((t|T)[a-zA-Z]{1})([\d]{3,4}){$regionCodePrefixRegex}$/u", // 1993 - now.
           'YY'  => "/^(yy|YY)([\d]{3}){$regionCodePrefixRegex}$/u", // 2006 - now.
           'WW'  => "/^(ww|WW)([\d]{3}){$regionCodePrefixRegex}$/u", // 2006 - now.
           'WV'  => "/^(wv|WV)([\d]{3}){$regionCodePrefixRegex}$/u", // 2006 - now.
           'ZZ'  => "/^(zz|ZZ)([\d]{3})(A{$regionCodePrefixRegex}|{$regionCodePrefixRegex})$/u", // 2006 - now.
           'CMD' => "/^([\d]{3})(cmd|CMD)([\d]{3})$/u", // 2006 - now.
           'CMC' => "/^([\d]{3})(cmc|CMC)([\d]{3})$/u", // 2006 - now.
           'CD'  => "/^([\d]{3})(cd|CD)([\d]{3})$/u", // 2006 - now.
           'CC'  => "/^([\d]{3})(cc|CC)([\d]{3})$/u", // 2006 - now.
           'K'   => "/^([\d]{3})(k|K)([\d]{3})$/u", // 2006 - now.
            1    => "/^(([d-sD-S]{1}[a-zA-Z]{1})|([u-vU-V]{1}[b-zB-Z]{1}))([\d]{3}){$regionCodePrefixRegex}$/u", // 2006 - now.
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
            case 'T':
                return $parts[1] . ' ' . $parts[3] . ' ' . $parts[4];
                break;
            case 1:
                if ($parts[2] && !$parts[3] ) {
                    return $parts[2] . ' ' . $parts[4] . ' ' . $parts[5];
                    break;
                } else {
                    return $parts[3] . ' ' . $parts[4] . ' ' . $parts[5];
                    break;
                }
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
