<?php
class Bdd
{
    public static function connexion()
    {
        try {
            return new PDO("mysql:host=localhost;prot=3306;dbname=projetphp", "root", "");
        } catch (Exception $e) {
            return $e->getMessage();

        }
    }
}
$bdd = Bdd::connexion();