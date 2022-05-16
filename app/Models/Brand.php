<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class Brand extends CoreModel
{


    static public function getBrandInFooter () {
        $pdo = Database::getPdo();
        $sql = 'SELECT * FROM brands';
        $pdoStatement = $pdo->query($sql);
        $footerBrand = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Brand');
        return $footerBrand;
    }

    static public function findAll()
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT * FROM brands';
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        // https://www.php.net/manual/fr/pdostatement.fetchall.php
        $listObject = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Brand');
        // 4. renvoyer (return) le résultat
        return $listObject;
    }

    /**
     * Get the value of name
     */ 

}