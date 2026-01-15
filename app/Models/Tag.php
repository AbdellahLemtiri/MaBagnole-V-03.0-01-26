<?php

namespace App\Models;

use App\Config\Database;
use App\Utils\Logger;
use Exception;
use PDO;

class Tag
{
    private $db;
    private $idTag;
    private $nomTag;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getNomTag()
    {
        return $this->nomTag;
    }
    public function setNomTag($nom)
    {
        $this->nomTag = $nom;
    }

    public function getidTag()
    {
        return $this->idTag;
    }
    public function setidTag($nom)
    {
        $this->idTag = $nom;
    }
    public function getAll()
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM tags ORDER BY nomTag ASC";
        $stmt = $conn->query($sql);
        try {
            return $stmt->fetchAll(PDO::FETCH_CLASS, Tag::class);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }


    public function getTagsByArticle($idArticle)
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT t.* FROM tags t
                JOIN article_tags at ON t.idTag = at.idTag
                WHERE at.idArticle = ?";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$idArticle]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, Tag::class);
        } catch (Exception $e) {

            Logger::log($e->getMessage());
            return [];
        }
    }

    public function create()
    {
        $conn = $this->db->getConnection();
        $sql = "INSERT INTO tags (nomTag) VALUES (?)";
        try {
            $stmt = $conn->prepare($sql);
            return $stmt->execute([$this->nomTag]);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    public function updateTag()
    {
        $conn = $this->db->getConnection();
        $sql = "UPDATE tags set nomTag = ? WHERE idTag = ?";
        try {
            $stmt = $conn->prepare($sql);
            return $stmt->execute([$this->nomTag, $this->idTag]);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }


    public function delete(): bool
    {
        $conn = $this->db->getConnection();
        $sql = "DELETE FROM tags WHERE idTag = ?";
        try {
            $stmt = $conn->prepare($sql);
            return $stmt->execute([$this->idTag]);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

 
}
