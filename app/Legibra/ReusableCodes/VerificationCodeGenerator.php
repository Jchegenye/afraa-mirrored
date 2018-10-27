<?php 

namespace Afraa\Legibra\ReusableCodes;
use Afraa\Legibra\ReusableCodes\DateFormats;

{

    /**
     * This trait handles all types of verification codes you wish to have,
     * Add your own custom verification codes here.
     *
     * @author Jackson A. Chegenye
     * @return string
     */
    trait GenerateCustomVerifyTokenTrait {

        /**
         * Generate verification code for registration users.
         *
         * @author Jackson A. Chegenye
         * @return string
         */
        public static function generateRegistrationVerifyCode()
        {
            
            //Fetch available date formats.
            $date = new DateFormats();
            $DateType4 = $date->date();

            //Verification code format
            $code =  env('APP_NAME', 'Afraa') . sha1(time()) . $DateType4['DateType4'];
            return $code;

        }

        /**
         * Generate verification token also check for dublicates
         * 
         * @author Jackson A. Chegenye
         * @param $code
         * @return string
         */
        function generatePermissionsCode($length = 64)
        {

                if ( ! function_exists('openssl_random_pseudo_bytes'))
                {
                    throw new RuntimeException('OpenSSL extension is required.');
                }

                $bytes = openssl_random_pseudo_bytes($length * 2);

                if ($bytes === false)
                {
                    throw new RuntimeException('Unable to generate random string.');
                }

                $code = substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);

            // $code =  sha1(time());
            return $code;

        }

    }

}