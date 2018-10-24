<?php 

namespace Afraa\Legibra\ReusableCodes;
use Afraa\Legibra\ReusableCodes\DateFormats;

{

    /**
     * Add your own custom verification codes here.
     *
     * @author Jackson A. Chegenye
     * @return string
     */

    class VerificationCodeGenerator
    {

        /**
         * Generate verification code for registration users.
         *
         * @author Jackson A. Chegenye
         * @return string
         */
        public static function generateRegistrationVerifyCode($code)
        {
            
            //Fetch available date formats.
            $date = new DateFormats();
            $DateType4 = $date->date();

            //Verification code format
            $code =  env('APP_NAME', 'Afraa') . str_random(42) . $DateType4['DateType4'];
            return $code;

        }

        /**
         * Generate verification code for permissions
         * 
         * @author Jackson A. Chegenye
         * @param $code
         * @return string
         */
        public static function generatePermissionsCode($code)
        {

            $code =  str_random(10);
            return $code;

        }
    }
}