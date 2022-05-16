<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class Product extends CoreModel
 {

    private $description;
    private $description_totale;
    private $picture;
    private $contenance;
    private $status;
    private $rate;
    private $price;
    private $type_id;
    private $brand_id;

    static public function getSingleType ($id) {
        $pdo = Database::getPDO();
        $sql = 
        "SELECT types.id,
        types.name AS typeName,
                products.*
                FROM types
                INNER JOIN products
                ON types.id = products.type_id
                WHERE products.type_id =" . $id;
        $pdoStatement = $pdo->query($sql);
        $singleType = $pdoStatement->fetchAll(PDO::FETCH_CLASS,'App\Models\Product');
        return $singleType;
    }

    static public function getProductByBrand($id)
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT * FROM products WHERE id = ' . $id;
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        $listObject = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');
        // 4. renvoyer (return) le résultat
        return $listObject;
    }


    static public function findAll()
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT * FROM products';
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        // https://www.php.net/manual/fr/pdostatement.fetchall.php
        $listObject = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');
        // 4. renvoyer (return) le résultat
        return $listObject;
    }

    static public function find ($id) {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM products WHERE id=' . $id;
        $pdoStatement = $pdo->query($sql);
        $singleProduct = $pdoStatement->fetchObject('App\Models\Product');
        return $singleProduct;
    }


    public function insert () {
        $pdo = Database::getPDO();
        $sql = " INSERT INTO `products` (name, description, description_totale, price, status, rate, contenance, type_id, brand_id)
        VALUES (:name, :description, :description_totale, :price, :status, :rate, :contenance, :type_id, :brand_id)";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':name', $this->name);
        $pdoStatement->bindValue(':description', $this->description);
        $pdoStatement->bindValue(':description_totale', $this->description_totale);
        $pdoStatement->bindValue(':price', $this->price);
        $pdoStatement->bindValue(':status', $this->status);
        $pdoStatement->bindValue(':rate', $this->rate);
        $pdoStatement->bindValue(':status', $this->status);
        $pdoStatement->bindValue(':contenance', $this->contenance);
        $pdoStatement->bindValue(':type_id', $this->type_id);
        $pdoStatement->bindValue(':brand_id', $this->brand_id);

        $pdoStatement->execute();
        $insertedRows = $pdoStatement->rowCount();

        if ($insertedRows > 0) {
            $this->id = $pdo->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function update () {
        $pdo = Database::getPDO();
        $sql = "
            UPDATE `products`
            SET
                name = :name,
                description = :description,
                contenance = :content,
                price = :price
            WHERE id = :id
        ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':name', $this->name);
        $pdoStatement->bindValue(':description', $this->description);
        $pdoStatement->bindValue(':content', $this->contenance);
        $pdoStatement->bindValue(':price', $this->price);
        $pdoStatement->bindValue(':id', $this->id);

        $pdoStatement->execute();
        $updatedRows = $pdoStatement->rowCount();

        return ($updatedRows > 0);
    }

    public function delete()
    {
        $pdo = Database::getPDO();
        $sql = '
            DELETE FROM products
            WHERE id = :id
        ';
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $pdoStatement->execute();

        $deletedRows = $pdoStatement->rowCount();

        return ($deletedRows > 0);
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

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
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
     * Get the value of description_totale
     */ 
    public function getDescription_totale()
    {
        return $this->description_totale;
    }

    /**
     * Set the value of description_totale
     *
     * @return  self
     */ 
    public function setDescription_totale($description_totale)
    {
        $this->description_totale = $description_totale;

        return $this;
    }

    /**
     * Get the value of contenant
     */ 
    public function getContenance()
    {
        return $this->contenance;
    }

    /**
     * Set the value of contenant
     *
     * @return  self
     */ 
    public function setContenance($contenance)
    {
        $this->contenance = $contenance;

        return $this;
    }

    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}