<?php
/**
 * This file is part of the PositibeLabs Projects.
 *
 * (c) Pedro Carlos Abreu <pcabreus@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pcabreus\Utils\IntlNumber\Locale;

use Pcabreus\Utils\IntlNumber\IntlNumberInterface;
use Pcabreus\Utils\IntlNumber\NotNumberException;


/**
 * Class EsNumberConverter
 * @package Pcabreus\Utils\IntlNumber\Locale
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
class EsNumberConverter implements IntlNumberInterface
{
    /**
     * @param $number
     * @return string
     */
    public static function convertToWords($number)
    {
        $fraction = explode('.', (String)$number);

        return self::rule($fraction[0]).(count($fraction) == 2 ? ' con '.self::rule($fraction[1]) : ' con cero');
    }

    /**
     * @param $number
     * @return string
     * @throws NotNumberException
     */
    public static function rule($number)
    {
        $number = (String)$number;

        if (strlen($number) < 3) {
            switch ($number) {
                case '0': {
                    return 'cero';
                }
                case '1': {
                    return 'uno';
                }
                case '2': {
                    return 'dos';
                }
                case '3': {
                    return 'tres';
                }
                case '4': {
                    return 'cuatro';
                }
                case '5': {
                    return 'cinco';
                }
                case '6': {
                    return 'seis';
                }
                case '7': {
                    return 'siete';
                }
                case '8': {
                    return 'ocho';
                }
                case '9': {
                    return 'nueve';
                }
                case '10': {
                    return 'diez';
                }
                case '11': {
                    return 'once';
                }
                case '12': {
                    return 'doce';
                }
                case '13': {
                    return 'trece';
                }
                case '14': {
                    return 'catorce';
                }
                case '15': {
                    return 'quince';
                }
                case '16': {
                    return 'dieciséis';
                }
                case '17':
                case '18':
                case '19': {
                    return 'dieci'.self::rule($number[1]);
                }
                case '20': {
                    return 'veinte';
                }
                case '22': {
                    return 'veintidós';
                }
                case '23': {
                    return 'veintitrés';
                }
                case '26': {
                    return 'veintiséis';
                }
                case '21':
                case '24':
                case '25':
                case '27':
                case '28':
                case '29': {
                    return 'veinti'.self::rule($number[1]);
                }
                case '30': {
                    return 'treinta';
                }
                case '31':
                case '32':
                case '33':
                case '34':
                case '35':
                case '36':
                case '37':
                case '38':
                case '39': {
                    return 'treinta y '.self::rule($number[1]);
                }
                case '40': {
                    return 'cuarenta';
                }
                case '41':
                case '42':
                case '43':
                case '44':
                case '45':
                case '46':
                case '47':
                case '48':
                case '49': {
                    return 'cuarenta y '.self::rule($number[1]);
                }
                case '50': {
                    return 'cincuenta';
                }
                case '51':
                case '52':
                case '53':
                case '54':
                case '55':
                case '56':
                case '57':
                case '58':
                case '59': {
                    return 'cincuenta y '.self::rule($number[1]);
                }
                case '60': {
                    return 'sesenta';
                }
                case '61':
                case '62':
                case '63':
                case '64':
                case '65':
                case '66':
                case '67':
                case '68':
                case '69': {
                    return 'sesenta y '.self::rule($number[1]);
                }
                case '70': {
                    return 'setenta';
                }
                case '71':
                case '72':
                case '73':
                case '74':
                case '75':
                case '76':
                case '77':
                case '78':
                case '79': {
                    return 'setenta y '.self::rule($number[1]);
                }
                case '80': {
                    return 'ochenta';
                }
                case '81':
                case '82':
                case '83':
                case '84':
                case '85':
                case '86':
                case '87':
                case '88':
                case '89': {
                    return 'ochenta y '.self::rule($number[1]);
                }
                case '90': {
                    return 'noventa';
                }
                case '91':
                case '92':
                case '93':
                case '94':
                case '95':
                case '96':
                case '97':
                case '98':
                case '99': {
                    return 'noventa y '.self::rule($number[1]);
                }
                default: {
                    throw new NotNumberException("El valor ``$number``` no es un número válido.");
                }

            }
        } elseif (strlen($number) === 3) {
            if ($number === '100') {
                return 'cien';
            } elseif ($number[0] === '5') {
                $rest = substr($number, 1);

                return 'quinientos'.($rest === '00' ? '' : ' '.self::rule((integer)$rest));
            } elseif ($number[0] === '7') {
                $rest = substr($number, 1);

                return 'setecientos'.($rest === '00' ? '' : ' '.self::rule((integer)$rest));
            } elseif ($number[0] === '9') {
                $rest = substr($number, 1);

                return 'novecientos'.($rest === '00' ? '' : ' '.self::rule((integer)$rest));
            } else {
                $rest = substr($number, 1);

                return sprintf(
                    '%sciento%s%s',
                    $number[0] === '1' ? '' : self::rule($number[0], false),
                    $number[0] === '1' ? '' : 's',
                    $rest === '00' ? '' : ' '.self::rule((integer)$rest)
                );
            }

        } elseif (strlen($number) <= 6) {
            $centen = strlen($number) - 3;
            $rest = substr($number, $centen);

            return sprintf(
                '%smil%s',
                $centen === 1 && $number[0] === '1' ? '' : self::rule(substr($number, 0, $centen)).' ',
                $rest === '000' ? '' : ' '.self::rule((integer)$rest)
            );
        } elseif (strlen($number) <= 12) {
            $centen = strlen($number) - 6;
            $rest = substr($number, $centen);

            return sprintf(
                '%s%s',
                $centen === 1 && $number[0] === '1' ? 'un millón' : self::rule(substr($number, 0, $centen)).' millones',
                $rest === '000000' ? '' : ' '.self::rule((integer)$rest)
            );
        } else {
            throw new NotNumberException("El valor ``$number`` no es soportado por el convertidor a letras.");
        }
    }
}