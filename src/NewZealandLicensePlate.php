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
class NewZealandLicensePlate extends AbstractLicensePlate implements LicensePlateInterface
{
    protected $yearIssued = array(
        '1969' => array('FB', 'FD', 'FE'), 
        '1970' => array('FF', 'FG', 'FH', 'FI', 'FJ', 'FK', 'FL', 'FM'), 
        '1971' => array('FN', 'FP', 'FQ', 'FR', 'FS', 'FT', 'FV', 'FW'),
        '1972' => array('FX', 'FY', 'FZ', 'GA', 'GB', 'GC', 'GD', 'GE', 'GF', 'GH', 'GJ'),
        '1973' => array('GG', 'GI', 'GK', 'GL', 'GM', 'GN', 'GO', 'GP', 'GQ', 'GR', 'GS', 'GT', 'GU', 'GX', 'GY'),
        '1974' => array('GW', 'GZ', 'HA', 'HC', 'HD', 'HE', 'HF', 'HG', 'HH', 'HJ', 'HK'),
        '1975' => array('HB', 'HI', 'HL', 'HM', 'HN', 'HR', 'HS', 'HT', 'HU'),
        '1976' => array('HO', 'HP', 'HQ', 'HW', 'HX', 'HY', 'HZ', 'IA', 'IB', 'IC', 'ID', 'IF', 'IH', 'IJ'),
        '1977' => array('IE', 'IG', 'IK', 'IL', 'IM', 'IN', 'IP', 'IR'),
        '1978' => array('IQ', 'IS', 'IT', 'IU', 'IW', 'IX', 'IY', 'IZ', 'JA', 'JB'),
        '1979' => array('JC', 'JD', 'JE', 'JF', 'JG', 'JI', 'JJ', 'JT'),
        '1980' => array('JH', 'JK', 'JL', 'JM', 'JN', 'JO', 'JP', 'JQ', 'JR', 'JS', 'JU', 'JW', 'JX'),
        '1981' => array('JY', 'JZ', 'KA', 'KB', 'KC', 'KD', 'KE', 'KF', 'KG', 'KH', 'KI', 'KL'),
        '1982' => array('KJ', 'KK', 'KM', 'KN', 'KO', 'KP', 'KQ', 'KR', 'KS', 'KT', 'KY'),
        '1983' => array('KU', 'KW', 'KX', 'KZ', 'LA', 'LB', 'LC', 'LD', 'LE', 'LF', 'LG', 'LH', 'LI', 'LJ', 'LK', 'LL', 'LM', 'LN'),
        '1984' => array(''),
        '1985' => array(''),
        '1986' => array(''),
        '1987' => array('NA', 'NB', 'NC', 'ND', 'NF', 'NH', 'NI', 'NJ', 'NK', 'NL', 'NM', 'NN', 'NP'),
        '1988' => array('NO', 'NQ', 'NR', 'NS', 'NT', 'NU', 'NW', 'NX', 'NY', 'NZ', 'OA', 'OB'),
        '1989' => array(''),
        '1990' => array(''),
        '1991' => array(''),
        '1992' => array(''),
        '1993' => array(''),
        '1994' => array(''),
        '1995' => array(''),
        '1996' => array(''),
        '1997' => array(''),
        '1998' => array(''),
        '1999' => array(''),
        '2000' => array(''),
        '2001' => array(''),
        '1971' => array(''),
        '1971' => array(''),
        '1971' => array(''),
        '1971' => array(''),
        '1971' => array(''),
        '1971' => array(''),
    );

    protected $exceptionsTwoLetters = [
        'BO', 'FA', 'FO', 'FU', 'II', 'IO', 'CC', 'DC', 'FC', 'CR', 'MN',
    ];
    
    protected $exceptionsThreeLetters = [
        'ARS', 'ASS', 'BAD', 'BAG', 'BAT', 'BRA', 'BUM', 'BUT', 'CNT', 'CUM',
        'CUN', 'DUM', 'FAG', 'FAK', 'FAT', 'FCK', 'FKN', 'FKQ', 'FKU', 'FQM',
        'FQN', 'FUC', 'FUK', 'FUQ', 'FUZ', 'HAG', 'JAP', 'JEW', 'KFC', 'KGB',
        'KKK', 'KLL', 'KNT', 'KUM', 'LSD', 'NAZ', 'NGA', 'CCC', 'DCC', 'EBA',
        'FCC', 'FNA', 'FNB', 'FNC', 'FND', 'FNE', 'FNF', 'FNG', 'FNH', 'FNI',
        'FNJ', 'FNK', 'FNL', 'FNM', 'FNN', 'FNO', 'FNP', 'FNQ', 'FNR', 'FNS',
        'FNT', 'FNU', 'FNV', 'FNW', 'FNX', 'FNY', 'FNZ', 'GAA', 'GBA', 'GCA',
        'GDA', 'GEA', 'GFA', 'GGA', 'GHA', 'MMM', 'NWA',
    ];

    protected $sideCodes = [];

    public function __construct($licensePlate)
    {
        parent::__construct(strtoupper($licensePlate));

        //$regionCodePrefixRegex = "(" . implode("|", $this->regionCodes) . ")";

        $exceptionsThreeLetterPrefixRegex = "(" . implode("|", $this->exceptionsThreeLetters) . ")";
        
        /**
         * Some information related to the sidecodes and licenseplates from New Zealands.
         *
         * More info: https://en.wikipedia.org/wiki/Vehicle_registration_plates_of_New_Zealand
         *
         * @return bool|int|string
         */
        $this->sideCodes = [
            1 => "/^([a-zA-Z]{2})([\d]{1,4})$/u", // 1964 - 1996.
            2 => "/^([a-zA-Z]{2})([\d]{4})$/u", // 1996 - 2001. 
            3 => "/^((?!{$exceptionsThreeLetterPrefixRegex})[A-Za-z]{3})([1-9]\d\d)$/ui" // 2001 - now.
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
            case 3:
                return $parts[1] . '' . $parts[3];
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
        return 'NZ';
    }

    public function getThreeLetterISO()
    {
        return 'NZL';
    }
}

?>
