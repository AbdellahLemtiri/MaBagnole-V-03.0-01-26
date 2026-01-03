<?php

namespace App\Models;

use App\Database\Database;
use App\Utils\Logger;
use PDO;
use Exception;

class Categorie
{

    protected int $idCategorie;
    protected string $titre;
    protected string $description;


    public function setIdC($id): bool
    {
        if ($id <= 0) return false;
        $this->idCategorie = $id;
        return true;
    }

    public function getIdC(): int
    {
        return $this->idCategorie;
    }

    public function setTitre($nom): bool
    {
        if (strlen($nom) < 3) return false;
        $this->titre = $nom;
        return true;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }
    public function setDescription($description): bool
    {
        if (strlen($description) < 5) return false;
        $this->description = $description;
        return true;
    }

    public function getDescription(): string
    {
        return $this->description;
    }


    public static function getAll(): array
    {
        try {
            $conn = (new Database())->getConnection();
            $sql = "SELECT * FROM categorie ORDER BY idCategorie DESC";
            $stmt = $conn->query($sql);

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $categories = [];

            foreach ($res as $row) {
                $obj = new Categorie();
                $obj->setIdC($row['idCategorie']);
                $obj->setTitre($row['titre']);
                $categories[] = $obj;
            }
            return $categories;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }
     public static function getAllByName(): array
    {
        try {
            $conn = (new Database())->getConnection();
            $sql = "  SELECT DISTINCT titre  FROM categorie ORDER BY titre DESC";
            $stmt = $conn->query($sql);

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $categories = [];

            foreach ($res as $row) {
                $obj = new Categorie();
                $obj->setTitre($row['titre']);
                $categories[] = $obj;
            }
            return $categories;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }

    public function create(): bool
    {

        $sql = "INSERT INTO categories (titre,description) VALUES (:titre,:description)";

        try {
            $conn = (new Database())->getConnection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":titre", $this->titre);
            $stmt->bindParam(":description", $this->description);
            return $stmt->execute();
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }


    public function update(): bool
    {
        $sql = "UPDATE categorie SET titre = :titre,description = :desc WHERE idCategorie = :id";

        try {
            $conn = (new Database())->getConnection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $this->idCategorie);
            $stmt->bindParam(":titre", $this->titre);
            $stmt->bindParam(":desc", $this->description);
            return $stmt->execute();
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }


    public function delete($id): bool
    {
        $sql = "DELETE FROM categorie WHERE idCategorie = :id";

        try {
            $conn = (new Database())->getConnection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        } 
        catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
}
