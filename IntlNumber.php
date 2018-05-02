<?php
/**
 * This file is part of the PositibeLabs Projects.
 *
 * (c) Pedro Carlos Abreu <pcabreus@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pcabreus\Utils\IntlNumber;

use Pcabreus\Utils\IntlNumber\Locale\EsNumberConverter;


/**
 * Class IntlNumber
 * @package Pcabreus\Utils\IntlNumber
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
class IntlNumber
{
    /**
     * @param $number
     * @param null $locale
     * @return string
     */
    public static function convertToWords($number, $locale = null)
    {
        switch ($locale) {
            case 'es':
            default: {
                return EsNumberConverter::convertToWords($number);
            }
        }
    }
}