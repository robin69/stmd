<?php


/**
 * Class MY_encrypt
 *
 * Permet de contourner le problème lié au chargement du module PHP mcrypt
 * qui se comporte différement sur tous les environnements.
 *
 *
 */
class MY_encrypt extends CI_Encrypt
{

    public function __construct()
    {
        if (!function_exists('mcrypt_encrypt')) {
            throw new Exception("Encryption requires mcrypt PHP extension!");

        }

        parent::__construct();
    }

}
