<?php

namespace App\Models;

use App\Config\Database;
use App\Utils\Logger;
use Exception;


class Favoris
{
    private int $idClient;
    private int $idVoiture;
    private int $idFavoris;


    public function getIdClient(): int
    {
        return $this->idClient;
    }

    public function getIdVoiture(): int
    {
        return $this->idVoiture;
    }

    public function getIdFavoris(): int
    {
        return $this->idFavoris;
    }


    public function setIdClient(int $idClient): void
    {
        $this->idClient = $idClient;
    }

    public function setIdVoiture(int $idVoiture): void
    {
        $this->idVoiture = $idVoiture;
    }

    public function setIdFavoris(int $idFavoris): void
    {
        $this->idFavoris = $idFavoris;
    }

    public function __toString(): string
    {
        return   "Favoris [ID:  " . $this->idFavoris .
            ", User ID:    " . $this->idClient .
            ", Voiture ID: " . $this->idVoiture . "]";
    }
    public function isFavoris(): bool
    {

        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT * FROM favoris where idClient = :idC and idV = :idVoiture";
            $stmt = $conn->excute([
                ':idC' => $this->getIdClient(),
                ':idV' => $this->getIdVoiture()
            ]);
            if ($stmt->fetch()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
}
