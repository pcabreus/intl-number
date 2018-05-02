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


/**
 * Class IntlNumberInterface
 * @package Pcabreus\Utils\IntlNumber
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
interface IntlNumberInterface
{
    public static function convertToWords($number);
}