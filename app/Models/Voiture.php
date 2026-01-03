<?php

namespace App\Models;

use App\Database\Database;
use App\Utils\Logger;
use PDO;
use Exception;

class Voiture extends Categorie
{
    private int $idV = 0;
    private string $marque = "";
    private string $modele = "";
    private string $matricule = ""; 
    private string $image = "";
    private string $boite = "";
    private string $carburant = "";
    private float $prixJr = 0.0;
    private int $idC = 0;
    private int $status = 0;
    private int $places = 0;


    public function getIdV(): int
    {
        return $this->idV;
    }
    public function setIdV(int $idV): void
    {
        $this->idV = $idV;
    }

    public function getMarqueV(): string
    {
        return $this->marque;
    }
    public function setMarqueV(string $marque): void
    {
        $this->marque = $marque;
    }

    public function getModeleV(): string
    {
        return $this->modele;
    }
    public function setModeleV(string $modele): void
    {
       $this->modele = $modele;
    }

    public function getMatriculeV(): string
    {
        return $this->matricule;
    }
    public function setMatriculeV(string $matricule): void
    {
        $this->matricule = $matricule;
    }

    public function getPrixJourV(): float
    {
        return $this->prixJr;
    }
    public function setPrixJourV(float $prix): void
    {
        if ($prix > 0) $this->prixJr = $prix;
    }

    public function getImageUrlV(): string
    {
        return $this->image;
    }
    public function setImageUrlV(string $url): void
    {
        $this->image = $url;
    }

    public function getBoiteV(): string
    {
        return $this->boite;
    }
    public function setBoiteV(string $boite): void
    {
        if (preg_match('/^(Manuelle|Automatique)$/i', $boite)) $this->boite = $boite;
    }

    public function getCarburantV(): string
    {
        return $this->carburant;
    }
    public function setCarburantV(string $carburant): void
    {
        $this->carburant = $carburant;
    }

    public function getPlacesV(): int
    {
        return $this->places;
    }
    public function setPlacesV(int $places): void
    {
        if ($places >= 2 && $places <= 9) $this->places = $places;
    }

    public function getIdCV(): int
    {
        return $this->idC;
    }
    public function setIdCV(int $idC): void
    {
        if ($idC > 0) $this->idC = $idC;
    }

    public function getStatusV(): int
    {
        return $this->status;
    }
    public function setStatusV(int $statut): void
    {
        $this->status = $statut;
    }



    public function ajouteVoiture(): bool
    {
        try {

            $conn = Database::getInstance()->getConnection();

            $sql = "INSERT INTO voitures (marque, modele, matricule, prixJr, image, boite, carburant, places, idC) 
                    VALUES (:marque, :modele, :matricule, :prix, :image, :boite, :carburant, :places, :idC)";

            $stmt = $conn->prepare($sql);

            return $stmt->execute([
                ':marque'    => $this->marque,
                ':modele'    => $this->modele,
                ':matricule' => $this->matricule,
                ':prix'      => $this->prixJr,
                ':image'     => $this->image,
                ':boite'     => $this->boite,
                ':carburant' => $this->carburant,
                ':places'    => $this->places,
                ':idC'       => $this->idC,

            ]);
        } catch (Exception $e) {

            return false;
        }
    }

    public function updateVoiture(): bool
    {
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "UPDATE voitures SET 
                        marque = :marque, 
                        modele = :modele, 
                        matricule = :matricule, 
                        prixJr = :prix, 
                        image = :image, 
                        boite = :boite, 
                        carburant = :carburant, 
                        places = :places, 
                        idC = :idC, 
                        status = :status 
                    WHERE idV = :id";

            $stmt = $conn->prepare($sql);

            return $stmt->execute([
                ':id'        => $this->idV,
                ':marque'    => $this->marque,
                ':modele'    => $this->modele,
                ':matricule' => $this->matricule,
                ':prix'      => $this->prixJr,
                ':image'     => $this->image,
                ':boite'     => $this->boite,
                ':carburant' => $this->carburant,
                ':places'    => $this->places,
                ':idC'       => $this->idC,
                ':status'    => $this->status
            ]);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    public function deleteVoiture(): bool
    {
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "DELETE FROM voitures WHERE idV = :id";
            $stmt = $conn->prepare($sql);

            return $stmt->execute([':id' => $this->idV]);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }


    public static function getAllVoitures(): array
    {
        try {
            $conn = Database::getInstance()->getConnection();

            $sql = "SELECT v.*, c.titre 
                    FROM voitures v 
                    LEFT JOIN categories c ON v.idC = c.idCategorie
                    ORDER BY v.idV DESC";

            $stmt = $conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $voitures = [];
            foreach ($result as $row) {
                $v = new Voiture();

                $v->setIdV($row['idV']);
                $v->setMarqueV($row['marque']);
                $v->setModeleV($row['modele']);
                $v->setMatriculeV($row['matricule']);
                $v->setPrixJourV($row['prixJr']);
                $v->setImageUrlV($row['image']);
                $v->setBoiteV($row['boite']);
                $v->setCarburantV($row['carburant']);
                $v->setPlacesV($row['places']);
                $v->setIdCV($row['idC']);
                $v->setStatusV($row['status']);
                $v->setTitre($row['titre']);



                $voitures[] = $v;
            }
            return $voitures;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }

    public static function getVoitureById($id)
    {
        try {
            $conn = Database::getInstance()->getConnection();
            $sql = "SELECT * FROM voitures WHERE idVoiture = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $v = new Voiture();
                $v->setIdV($row['idV']);
                $v->setMarqueV($row['marque']);
                $v->setModeleV($row['modele']);
                $v->setMatriculeV($row['matricule']);
                $v->setPrixJourV($row['prix']);
                $v->setImageUrlV($row['image']);
                $v->setBoiteV($row['boite']);
                $v->setCarburantV($row['carburant']);
                $v->setPlacesV($row['places']);
                $v->setIdCV($row['idC']);
                $v->setStatusV($row['status']);
                return $v;
            }
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
}
