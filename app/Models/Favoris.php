<?php

namespace App\Models;

use App\Config\Database;
use App\Utils\Logger;
use Exception;
use PDO;
class Favoris
{
    private int $idClient;
    private int $idVoiture;
    private int $idFavoris;

 
    public function getIdClient(): int { return $this->idClient; }
    public function getIdVoiture(): int { return $this->idVoiture; }
    public function getIdFavoris(): int { return $this->idFavoris; } 

    public function setIdClient(int $idClient): void { $this->idClient = $idClient; }
    public function setIdVoiture(int $idVoiture): void { $this->idVoiture = $idVoiture; }
    public function setIdFavoris(int $idFavoris): void { $this->idFavoris = $idFavoris; }


    private function isFavoris(): bool
    {
        try {
            $conn = Database::getInstance()->getConnection();
           
            $sql = "SELECT idFavoris FROM favoris WHERE idClient = :idC AND idV = :idV";
            $stmt = $conn->prepare($sql);
            
            $stmt->execute([ 
                ':idC' => $this->getIdClient(),
                ':idV' => $this->getIdVoiture()
            ]);

         
            return $stmt->fetch() ? true : false;

        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    public function toggle(): string 
    {
        $conn = Database::getInstance()->getConnection();

        try {
            if ($this->isFavoris()) {
           
                $sql = "DELETE FROM favoris WHERE idClient = :idC AND idV = :idV";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':idC' => $this->getIdClient(),
                    ':idV' => $this->getIdVoiture()
                ]);
                return "removed"; 

            } 
            else {            
                $sql = "INSERT INTO favoris (idClient, idV) VALUES (:idC, :idV)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':idC' => $this->getIdClient(),
                    ':idV' => $this->getIdVoiture()
                ]);
                return "added"; 
            }
        } catch (Exception $e) {
            Logger::log($e->getMessage()); 
            return "error";
        }
    }
}