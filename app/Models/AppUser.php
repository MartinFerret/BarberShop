<?php
namespace App\Models;
use App\Utils\Database;
use PDO;

class AppUser extends CoreModel {

    private $email;
    private $password;
    private $firstname;
    private $lastname;
    private $role;
    private $status;
    private $created_at;
    private $updated_at;

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    static public function findByEmail ($email) {
        $pdo = Database::getPDO();
        $sql = "
            SELECT * FROM `app_user` WHERE `email` = :email";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':email', $email);
        $pdoStatement->execute();
        $appUser = $pdoStatement->fetchObject(self::class);
        return $appUser;
    }

    static public function find ($id) {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM app_user WHERE id=' . $id;
        $pdoStatement = $pdo->query($sql);
        $singleUser = $pdoStatement->fetchObject(self::class);
        return $singleUser;
    }

    static public function findAll()
    {
        // 1. se connecter à la base de donnée
        $pdo = Database::getPDO();
        // 2. faire la requete SQL
        $sql = 'SELECT * FROM app_user';
        $pdoStatement = $pdo->query($sql);
        // 3. transformer le résultat en Objet
        // https://www.php.net/manual/fr/pdostatement.fetchall.php
        $listUsers = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        // 4. renvoyer (return) le résultat
        return $listUsers;
    }

    public function insert () {
        $pdo = Database::getPDO();
        $sql = " INSERT INTO `app_user` (email, password, firstname, lastname)
        VALUES (:email, :password, :firstname, :lastname)";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':email', $this->email);
        $pdoStatement->bindValue(':password', $this->password);
        $pdoStatement->bindValue(':firstname', $this->firstname);
        $pdoStatement->bindValue(':lastname', $this->lastname);
/*         $pdoStatement->bindValue(':role', $this->role);
        $pdoStatement->bindValue(':status', $this->status);
        $pdoStatement->bindValue(':created_at', $this->created_at);
        $pdoStatement->bindValue(':updated_at', $this->updated_at); */

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
            UPDATE `app_user`
            SET
                email = :email,
                password = :password,
                firstname = :firstname,
                lastname = :lastname,
                role = :role,
                status = :status,
                created_at = :created_at,
                updated_at = :updated_at
            WHERE id = :id
        ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':email', $this->email);
        $pdoStatement->bindValue(':password', $this->password);
        $pdoStatement->bindValue(':firstname', $this->firstname);
        $pdoStatement->bindValue(':lastname', $this->lastname);
        $pdoStatement->bindValue(':role', $this->role);
        $pdoStatement->bindValue(':status', $this->status);
        $pdoStatement->bindValue(':created_at', $this->created_at);
        $pdoStatement->bindValue(':updated_at', $this->updated_at);
        $pdoStatement->bindValue(':id', $this->id);

        $pdoStatement->execute();
        $updatedRows = $pdoStatement->rowCount();

        return ($updatedRows > 0);
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

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

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}