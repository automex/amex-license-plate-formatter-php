<?php

namespace Amex\LicensePlate;

use Amex\LicensePlate\AbstractLicensePlate;
use Amex\LicensePlate\LicensePlateInterface;

/**
 * New Zealand license plate formatted and utilities.
 *
 * Class NewZealandLicensePlate.
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
        '1984' => array('LO', 'LP', 'LQ', 'LR', 'LS', 'LT', 'LU', 'LW', 'LX', 'LY', 'LZ', 'MA', 'MB', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MJ', 'MK'),
        '1985' => array('LO', 'LP', 'LQ', 'LR', 'LS', 'LT', 'LU', 'LW', 'LX', 'LY', 'LZ', 'MA', 'MB', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MJ', 'MK', 'MI', 'ML', 'MM', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MW', 'MX', 'MY', 'MZ', 'NE', 'NG'),
        '1986' => array('MI', 'ML', 'MM', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MW', 'MX', 'MY', 'MZ', 'NE', 'NG'),
        '1987' => array('NA', 'NB', 'NC', 'ND', 'NF', 'NH', 'NI', 'NJ', 'NK', 'NL', 'NM', 'NN', 'NP'),
        '1988' => array('NO', 'NQ', 'NR', 'NS', 'NT', 'NU', 'NW', 'NX', 'NY', 'NZ', 'OA', 'OB'),
        '1989' => array('OC', 'OD', 'OE', 'OF', 'OG', 'OH', 'OI', 'OJ', 'OK', 'OL', 'OM', 'ON', 'OO', 'OP', 'OQ', 'OS'),
        '1990' => array('OR', 'OT', 'OU', 'OW', 'OX', 'OY', 'OZ', 'PA', 'PB', 'PC', 'PD', 'PE', 'PF', 'PG', 'PH', 'PI', 'PJ', 'PK', 'PL', 'PO'),
        '1991' => array('PM', 'PN', 'PP', 'PQ', 'PR', 'PS', 'PU', 'PW', 'PX', 'PY', 'PZ', 'RA', 'RB', 'RC', 'RD'),
        '1992' => array('RE', 'RF', 'RG', 'RH', 'RI', 'RJ', 'RK', 'RL', 'RM', 'RN', 'RO', 'RP', 'RQ', 'RR', 'RT'),
        '1993' => array('RS', 'RU', 'RW', 'RX', 'RY', 'RZ', 'SA', 'SB', 'SC', 'SD', 'SE', 'SF'),
        '1994' => array('SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SP', 'SQ', 'SR', 'SS', 'ST', 'SU', 'SW', 'SY', 'SX', 'SZ', 'TA'),
        '1995' => array('TB', 'TC', 'TD', 'TE', 'TF', 'TG', 'TH', 'TI', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO', 'TP', 'TQ', 'TR', 'TS', 'TT', 'TW', 'TX'),
        '1996' => array('TU', 'TY', 'TZ', 'UA', 'UB', 'UC', 'UD', 'UE', 'UF', 'UG', 'UH', 'UI', 'UJ', 'UK', 'UL' ,'UM', 'UN', 'UO', 'UP', 'UQ', 'UR', 'US', 'UT'),
        '1997' => array('UU', 'UW', 'UX', 'UY', 'UZ', 'WA', 'WB', 'WC', 'WD', 'WE', 'WF', 'WG', 'WH', 'WI', 'WJ', 'WK', 'WL', 'WM', 'WN', 'WO', 'WP', 'WQ', 'WR', 'WS'),
        '1998' => array('WT', 'WU', 'WW', 'WX', 'WY', 'WZ', 'XA', 'XB', 'XC', 'XD', 'XE', 'XF', 'XG', 'XH', 'XI', 'XJ', 'XK', 'XL', 'XM', 'XN', 'XO', 'XP', 'XQ'),
        '1999' => array('XR', 'XS', 'XT', 'XU', 'XW', 'XX', 'XY', 'XZ', 'YA', 'YB', 'YC', 'YD', 'YE', 'YF', 'YG', 'YH', 'YI', 'YJ', 'YK', 'YL', 'YM', 'YN', 'YO', 'YP', 'YQ', 'YR', 'YS'),
        '2000' => array('YT', 'YU', 'YW', 'YX', 'YY', 'YZ', 'ZA', 'ZB', 'ZC', 'ZD', 'ZE', 'ZF', 'ZG', 'ZH', 'ZI', 'ZJ', 'ZK', 'ZL', 'ZM', 'ZN', 'ZO', 'ZP', 'ZQ', 'ZR', 'ZS', 'ZT', 'ZU'),
        '2001' => array('ZW', 'ZX', 'ZY', 'ZZ'),
        '2002' => array(''),
        '2003' => array(''),
        '2004' => array(''),
        '2005' => array(''),
        '2006' => array(''),
        '2007' => array(''),
        '2008' => array(''),
        '2009' => array(''),
        '2010' => array(''),
        '2011' => array(''),
        '2012' => array(''),
        '2013' => array(''),
        '2014' => array(''),
        '2015' => array(''),
        '2016' => array(''),
        '2017' => array(''),
        '2018' => array(''),
        '2019' => array(''),
        '2020' => array(''),
        '2021' => array(''),
        '2022' => array(''),
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

    protected $exceptionsSkippedS1000 = [
        'WS', 'WT', 'WU'
    ];

    protected $sideCodes = [];

    public function __construct($licensePlate)
    {
        parent::__construct(strtoupper($licensePlate));

        $exceptionsThreeLetterRegex = "(" . implode("|", $this->exceptionsThreeLetters) . ")";
        $skipped = "(" . implode("|", $this->exceptionsSkippedS1000) . ")";
        
        /**
         * Some information related to the sidecodes and licenseplates from New Zealands.
         *
         * More info: https://en.wikipedia.org/wiki/Vehicle_registration_plates_of_New_Zealand
         * Official: https://www.nzta.govt.nz/roads-and-rail/research-and-data/fascinating-facts/number-plates/
         *
         * @return bool|int|string
         */
        $this->sideCodes = [
            // Cars and heavy vehicles
            1  => "/^((?!{$skipped})[A-Za-z]{2})([1-9][0-9]{0,4})$/ui",              // 1964 - 1996.
            2  => "/^((?={$skipped})[A-Za-z]{2})([1-9][0-9]{0,4})$/ui",              // 1996 - 2001.
            // Needs fix starting point of the plate UR for correctness and exceptions 1 to 3. 
            3  => "/^((?!{$skipped})[a-zA-Z]{2})([1-9]\d\d\d)$/ui",                  // 1996 - 2001.
            4  => "/^((?!{$exceptionsThreeLetterRegex})[A-Za-z]{3})([1-9]\d\d)$/ui", // 2001 - now.
            // Caravans and trailers
            5  => "/^([1-9]\d\d\d)([A-Z-a-z]{1})$/ui",                               // unknown.
            6  => "/^([A-Z-a-z]{1})([1-9]\d\d\d)$/ui",                               // unknown.
            7  => "/^([1-9]\d\d)([A-Za-z]{1}(?!((W|Y|Z)))[A-Za-z]{1})$/ui",          // unknown - 2009.
            8  => "/^([A-Za-z]{1})([1-9]\d\d)([A-Za-z]{1})$/ui",                     // 2009 - 2014.  
            9  => "/^([1-9]{1})([A-Za-z]{1})([1-9]\d\d)$/ui",                        // 2014 - 2019.
            10 => "/^([1-9]\d)([A-Za-z]{1})([1-9]\d)$/ui",                           // 2019 - 2022.
            11 => "/^([1-9]\d\d)([A-Za-z]{1})([1-9]{1})$/ui",                        // 2022 - now.
            // Motorcycles and tractors
            12 => "/^([1-9]{1}[0-9]{0,1})([A-Za-z]{3})$/ui",                         // unknown - 2009
            13 => "/^([A-Za-z]{1})([1-9]{1})([A-Za-z]{3})$/ui",                      // 2009 - now
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
            case 2:
            case 4:
                return $parts[1] . '' . $parts[3];
                break;
            case 8:
            case 9:
            case 10:
            case 11:
            case 13:
                return $parts[1] . '' . $parts[2] . '' . $parts[3];
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
