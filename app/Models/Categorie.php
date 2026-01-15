<?php

namespace App\Models;

use App\Config\Database;
use App\Utils\Logger;
use PDO;
use Exception;

class Categorie
{

    protected int $idCategorie;
    protected string $titre;
    protected string $description;
    protected string $icone;
    public function __construct() {}
    public function setIdC($id)
    {

        $this->idCategorie = $id;
    }

    public function getIdC(): int
    {
        return $this->idCategorie;
    }
    public function setIcone($icone): void
    {

        $this->icone = $icone;
    }

    public function getIcone(): string
    {
        return $this->icone;
    }

    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }


    public static function getAll(): array
    {
        try {

            $sql = "SELECT * FROM categories ORDER BY idCategorie DESC";
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare($sql);


            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $categories = [];

            foreach ($res as $row) {
                $obj = new Categorie();
                $obj->setIdC($row['idCategorie']);
                $obj->setTitre($row['titre']);
                $obj->setIcone($row['icone']);
                $obj->setDescription($row['description']);
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

            $conn = Database::getInstance()->getConnection();
            $sql = "  SELECT DISTINCT titre  FROM categories ORDER BY titre DESC";
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
            $conn = Database::getInstance()->getConnection();
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
        $sql = "UPDATE categories SET titre = :titre,description = :desc WHERE idCategorie = :id";

        try {
            $conn = Database::getInstance()->getConnection();
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


    public function delete(): bool
    {
        $sql = "DELETE FROM categories WHERE idCategorie = :id";

        try {
            $conn = Database::getInstance()->getConnection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id", $this->idCategorie);
            return $stmt->execute();
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
}
