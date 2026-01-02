<?php
namespace App\Models;
use App\Database\Database;
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

    public function getTelephone(): string
    {
        return $this->phone;
    }

    public function setTelephone(string $tel): bool
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
        
        $conn = (new Database)->getConnection();


        $sql = "INSERT INTO user (nomUser, lastName, email, password, phone, role, status) 
                VALUES (:nom, :prenom, :email, :password, :phone, 'client', 1)";

        try {
            $stmt = $conn->prepare($sql);

            $stmt->execute([
                ':nom'      => $this->getNomUser(),
                ':prenom'   => $this->getLastName(),
                ':email'    => $this->getEmail(),
                ':password' => $this->getPassword(),
                ':phone'    => $this->getTelephone()
            ]);



            return true;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }

    }
}
