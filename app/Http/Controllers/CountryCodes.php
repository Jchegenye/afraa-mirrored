<?php

namespace Afraa\Http\Controllers;

class CountryCodes{

    /**
     *  convert country codes to country names
     *
     *  @param string | $code
     *
     *  @return string | $countryName
     */
    public function getCodeName($code){

        if($code == ""){
            return "";
        }else{
            $names = json_decode(file_get_contents("http://country.io/names.json"), true);

            $countryName = $names[$code];
    
            return $countryName;
        }
    }
}
