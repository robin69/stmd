<?php
/**
 * Created by PhpStorm.
 * User: Rumeau
 * Date: 28/02/15
 * Time: 19:01
 */

class Utils extends CI_Model{


    /******
     * Statuts de la table user_have_forfaits
     * @var array
     */
    private static $uhf = array(
        "old"               => "old",
        "demande"           => "demande",
        "en_cours"          => "forfait_en_cours",
        "demande_refusee"   =>  "demande_refusee"
    );



    //On récupère le nom du tableau et l'inde voulu
    public static function get($string)
    {
        list($var,$index) = explode("|",$string);
        return self::$var[$index];
    }
} 