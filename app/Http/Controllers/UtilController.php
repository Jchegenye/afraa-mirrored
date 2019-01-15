<?php

namespace Afraa\Http\Controllers;

class UtilController extends Controller
{

    /**
     *  generate a unique string
     *
     *  @return string | unique string
    */
    public function uniqueString($id) {

        $length = 15;

        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($length / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }

        return 'AFRAA'.'_'.$id.'_'.substr(bin2hex($bytes), 0, $length);
    }
}
