<?php 

namespace JCHEGENYE\JTech\ReusableCodes;
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
            $DateType3 = $date->date();

            //Verification code format
            $code =  "Afraa" . str_random(42) . $DateType3['DateType1'];
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