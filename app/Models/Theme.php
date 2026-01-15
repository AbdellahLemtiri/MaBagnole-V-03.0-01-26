<?php

namespace App\Models;

use App\Config\Database;
use Exception;
use PDO;
use App\Utils\Logger;

class Theme
{
    private int $idTheme;
    private string $nomTheme;
    private string $description;
    private string $iconeTheme;
    private $db;

    public function __construct()
    {

        $this->db = Database::getInstance();
    }

    public function getIdTheme(): int
    {
        return $this->idTheme;
    }

    public function setIdTheme(int $idTheme): void
    {
        $this->idTheme = $idTheme;
    }

    public function getNomTheme(): string
    {
        return $this->nomTheme;
    }

    public function setNomTheme(string $nomTheme): void
    {
        $this->nomTheme = $nomTheme;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function geticoneTheme(): string
    {
        return $this->iconeTheme;
    }

    public function seticoneTheme(string $iconeTheme): void
    {
        $this->iconeTheme = $iconeTheme;
    }

    public function getAllTheme()
    {
        $conn = $this->db->getConnection();
        try {
            $stmt = $conn->query("SELECT * FROM themes");
            $res =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            $themes = [];

            foreach ($res as $r) {
                $t = new Theme();
                $t->setDescription($r['description']);
                $t->seticoneTheme($r['iconeTheme']);
                $t->setNomTheme($r['nomTheme']);
                $t->setIdTheme($r['idTheme']);
                $themes[] = $t;
            }
            return $themes;
        } catch (Exception $e) {
            Logger::log("article" . $e->getMessage());
            return [];
        }
    }


    public function getThemeById(int $id)
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM themes WHERE idTheme = ?";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $res =  $stmt->fetch(PDO::FETCH_ASSOC);

            if ($res) {
                $t = new Theme();
                $t->setDescription($res['description']);
                $t->seticoneTheme($res['iconeTheme']);
                $t->setNomTheme($res['nomTheme']);
                $t->setIdTheme($res['idTheme']);
                return $t;
            }
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return null;
        }
    }


    public function createTheme(): bool
    {
        $conn = $this->db->getConnection();
        $sql = "INSERT INTO themes (nomTheme, description, iconeTheme) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        try {
            return $stmt->execute([$this->nomTheme, $this->description, $this->iconeTheme]);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    public function updateTheme(): bool
    {
        $conn = $this->db->getConnection();
        $sql = "UPDATE themes SET nomTheme = :nom , description = :description, iconeTheme = :icon WHERE idTheme = :id ";

        try {
            $stmt = $conn->prepare($sql);
            return $stmt->execute([':id' => $this->idTheme, ':nom' => $this->nomTheme, ':description' => $this->description, ':icon' => $this->iconeTheme]);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }


    public function delete(int $id): bool
    {

        try {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("DELETE FROM themes WHERE idTheme = ?");
            return $stmt->execute([$id]);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
}
