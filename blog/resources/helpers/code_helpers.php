<?php

use function Ramsey\Uuid\v1;
use App\Models\Colis;
use App\Models\Ligne;
use App\Models\Prescripteur;
use App\Models\Ticket;
use Ramsey\Uuid\Type\Integer;

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

    if (!function_exists("nbrePrescripteurs")) {
        function nbrePrescripteurs () {
            $nbre = Prescripteur::all()->count();
            return $nbre;
        }
    }

    if (!function_exists("nbrePrescripteursActifs")) {
        function nbrePrescripteursActifs () {
            $nbre = Prescripteur::where('actif', true)->count();
            return $nbre;
        }
    }

    if (!function_exists("nbrePrescripteursInactifs")) {
        function nbrePrescripteursInactifs () {
            $nbre = Prescripteur::where('actif', false)->count();
            return $nbre;
        }
    }

    if (!function_exists("nbrePrescripteursSite")) {
        function nbrePrescripteursSite($id) {
            $nbre = Prescripteur::where('numSite', $id)->count();
            return $nbre;
        }
    }

    if (!function_exists("nbrePrescripteursActifsSite")) {
        function nbrePrescripteursActifsSite($id) {
            $nbre = Prescripteur::where('numSite', $id)
                    ->where('actif', true)
                    ->count();
            return $nbre;
        }
    }