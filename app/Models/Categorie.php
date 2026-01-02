<?php

namespace App\Models;

use App\Database\Database;
use App\Utils\Logger;
use PDO;
use Exception;

class Categorie
{
    protected int $idC;
    protected int $titre;
    protected int $description;

    function setIdCategorie($id): bool
    {
        if ($id <= 0) {
            return false;
        } else {
            return true;
        }
    }
    function getIdCategorie(): int
    {
        return $this->idC;
    }
    function setTitreCategorie($titre): bool
    {
        if (strlen($titre) < 4) {
            return false;
        } else {
            return true;
        }
    }
    function getTitreCategorie(): string
    {
        return $this->titre;
    }
    function setDescriptionCategorie($description): bool
    {
        if (strlen($description) < 4) {
            return false;
        } else {
            return true;
        }
    }
    function getDescriptionCategorie(): string
    {
        return $this->description;
    }

    static function getAllCategorie(): array
    {
        try {
            $conn = (new Database())->getConnection();
            $sql = "SELECT * FROM categorie ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $les_categorie = [];

            foreach ($res as $r) {
                $obj = new Categorie();
                $obj->setDescriptionCategorie($r['description']);
                $obj->setIdCategorie($r['idC']);
                $obj->setTitreCategorie($r['titre']);
                $les_categorie[] = $obj;
            }
            return $les_categorie;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }
      static  function getAllCategorieByTitre(): array
    {
        try {
            $conn = (new Database())->getConnection();
            $sql = "SELECT DISTINCT titre FROM categorie ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $les_categorie = [];

            foreach ($res as $r) {
                $obj = new Categorie();
                $obj->setDescriptionCategorie($r['description']);
                $obj->setIdCategorie($r['idC']);
                $obj->setTitreCategorie($r['titre']);
                $les_categorie[] = $obj;
            }
            return $les_categorie;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }
    public function setCategorie(): bool
    {
     $conn = (new  Database())->getConnection();
     $sql = "INSERT INTO categorie (titre,description) value (':titre',':description')";
    try
    {
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(":titre",$this->titre);
       $stmt->bindParam(":description",$this->description);
       $stmt->execute();    
       return true;
     }catch(Exception $e){
     Logger::log($e->getMessage());
     return false;
    }
    }
     public function UpdateCategorie(): bool
    {
     $conn = (new  Database())->getConnection();
     $sql = "UPDATE  categorie  set titre = ':titre' ,description  = ':description'where id = ':id'";
    try
    {
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(":id",$this->idC);
       $stmt->bindParam(":titre",$this->titre);
       $stmt->bindParam(":description",$this->description);
       $stmt->execute();    
       return true;
     }catch(Exception $e){
     Logger::log($e->getMessage());
     return false;
    }
    }
    public function deleteCategorie(): bool
    {
     $conn = (new  Database())->getConnection();
     $sql = "DELETE FROM  categorie where id = ':id'";
    try
    {
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(":id",$this->idC);
       $stmt->execute();    
       return true;
     }
    catch(Exception $e){
    Logger::log($e->getMessage());
     return false;
    }
    }

    


}
