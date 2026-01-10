<?php

namespace App\Models;

use App\Config\Database;
use App\Utils\Logger;
use PDO;
use Exception;

class User
{
    protected int $idUser;
    protected string $name;
    protected string $lastName;
    protected string $email;
    protected string $password;
    protected string $role;
    protected int $status = 0;

    public function __construct() {}




    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): bool
    {

        if ($idUser > 0) {
            $this->idUser = $idUser;
            return true;
        }
        return false;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $nom): bool
    {

        if (preg_match("/^[a-zA-Z\s]+$/", $nom)) {
            $this->name = strtoupper(trim($nom));
            return true;
        }
        return false;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $prenom): bool
    {

        if (preg_match("/^[a-zA-Z\s]+$/", $prenom)) {
            $this->lastName = ucfirst(strtolower(trim($prenom)));
            return true;
        }
        return false;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = trim($email);
            return true;
        }
        return false;
    }


    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): bool
    {
        if (strlen($password) >= 6) {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
            return true;
        }
        return false;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): bool
    {
        $allowedRoles = ['admin', 'client'];
        if (in_array(strtolower($role), $allowedRoles)) {
            $this->role = strtolower($role);
            return true;
        }
        return false;
    }


    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): bool
    {

        if ($status === "1" || $status === "0") {
            $this->status = $status;
            return true;
        }
        return false;
    }


    public static function Login(string $email, string $passwordRaw)
    {

        $sql = "SELECT * FROM users WHERE email = :email";

        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);


            if (!$userData) {
                return "email_introuvable";
            }


            if ($userData['status'] == 0) {
                return "compte_bloque";
            }


            if (password_verify($passwordRaw, $userData['password'])) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['userName'] = $userData['name'];
                $_SESSION['userId'] = $userData['idUser'];
                $_SESSION['userRole'] = $userData['role'];

                return $userData['role'];
            }
            else {
                return "mot_de_passe_incorrect";
            }
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return "erreur_technique";
        }
    }
}
