<?php

namespace App\Models;

use App\Config\Database;
use app\Models\User;
use PDO;
use Exception;
use App\Utils\Logger;
use PDOException;

class Client extends User
{
    private $phone;

    public function __construct()
    {
        return parent::__construct();
    }
    protected string $telephone;

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $tel): bool
    {
        $cleanTel = str_replace([' ', '.', '-'], '', $tel);
        if (preg_match("/^(?:0|\+212)[5-7][0-9]{8}$/", $cleanTel)) {
            $this->phone = $cleanTel;
            return true;
        }

        return false;
    }
    public function signup(): bool
    {




        $sql = "INSERT INTO users (name, lastName, email, password, phone, role, status) 
                VALUES (:nom, :prenom, :email, :password, :phone, 'client', 1)";

        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute([
                ':nom'      => $this->getName(),
                ':prenom'   => $this->getLastName(),
                ':email'    => $this->getEmail(),
                ':password' => $this->getPassword(),
                ':phone'    => $this->getPhone()
            ]);



            return true;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
    public static function getAllClients(): array
    {

        $conn = Database::getInstance()->getConnection();

        $sql = "SELECT * FROM users WHERE role = 'client'";

        try {
            $stmt = $conn->query($sql);

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $users = [];

            foreach ($res as $r) {
                $obj = new Client();


                $obj->setIdUser($r['idUser']);
                $obj->setName($r['name']);
                $obj->setLastName($r['LastName']);
                $obj->setEmail($r['email']);
                $obj->setPhone($r['phone']);
                $obj->setPassword($r['password']);
                $obj->setStatus($r['status']);
                $obj->setRole($r['role']);
                $users[] = $obj;
            }
            return $users;
        } catch (PDOException $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }
}
