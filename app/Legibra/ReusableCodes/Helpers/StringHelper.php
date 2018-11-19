<?php

namespace Afraa\Legibra\ReusableCodes\Helpers;

/**
 * This helper custome helper class used to truncate words.
 * Can be used in place of the default str_limit() laravel funtion.
 * 
 * Blade Usage: {{ StringHelper::truncate($string, 5) }}
 *
 * @author Jackson A. Chegenye
 * @return Afraa\Legibra\ReusableCodes\Helpers\StringHelper
 */
class StringHelper {

    public static function truncate($string, $length = 50) {

        $limit = abs((int)$length);

        if(strlen($string) > $limit) {
          $string = preg_replace("/^(.{1,$limit})(\s.*|$)/s", '\1...', $string);
        }

    return $string;

   }

}