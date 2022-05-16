<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class Type extends CoreModel
{
    private $description;
    private $picture;


    static public function getTypeInFooter () {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM types';
        $pdoStatement = $pdo->query($sql);
        $listType = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Type');
        return $listType;
    }

    static public function getAllTypes () {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM types';
        $pdoStatement = $pdo->query($sql);
        $listTypes = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Type');
        return $listTypes; 
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}