<?php

use function Ramsey\Uuid\v1;
use App\Models\Colis;
use App\Models\Ligne;
use App\Models\Ticket;


    if (!function_exists("generateString")) {
        function generateString ($len_of_gen_str) {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
            $var_size = strlen($chars);
            $random_str="";
            for( $x = 0; $x < $len_of_gen_str; $x++ ) {  
                $random_str = $random_str. $chars[ rand( 0, $var_size - 1 ) ];   
            }
            return $random_str; 
        }
    }

    