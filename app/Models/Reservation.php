<?php

namespace App\Models;

use App\Config\Database;
use PDOException;
use Exception;
use PDO;
use App\Utils\Logger;
use App\Models\Voiture;
use App\Models\Client;

class Reservation

{

    private int $idReservation;
    private string $dateDebut;
    private string $dateFin;
    private string $lieuChange;
    private string $status;
    private int  $idVoiture;
    private int $idUser;
    private float $totalPrix;
    private Client $Client;
    private Voiture $voiture;
    public function getTotalPrix()
    {
        return $this->totalPrix;
    }
    public function setTotalPrix($prix)
    {
        $this->totalPrix = $prix;
    }
    private $db;


    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }


    public function getClient(): Client
    {
        return $this->Client;
    }

    public function getVoiture(): Voiture
    {
        return $this->voiture;
    }


    public function setClient(Client $Client)
    {
        $this->Client = $Client;
    }

    public function setVoiture(Voiture $voiture)
    {
        $this->voiture = $voiture;
    }


    public function getIdReservation()
    {
        return $this->idReservation;
    }
    public function setIdReservation(int $idReservation)
    {
        return $this->idReservation = $idReservation;
    }
    public function getDateDebut()
    {
        return $this->dateDebut;
    }
    public function setDateDebut(string $date)
    {
        $this->dateDebut = $date;
    }

    public function getDateFin()
    {
        return $this->dateFin;
    }
    public function setDateFin(string $date)
    {
        $this->dateFin = $date;
    }

    public function getLieuChange()
    {
        return $this->lieuChange;
    }
    public function setLieuChange(string $lieu)
    {
        $this->lieuChange = $lieu;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function getIdVoiture()
    {
        return $this->idVoiture;
    }
    public function setIdVoiture(int $id)
    {
        $this->idVoiture = $id;
    }




    public function getIdUser()
    {
        return $this->idUser;
    }
    public function setIdUser(int $id)
    {
        $this->idUser = $id;
    }

    public function addReseravtion()
    {
        $sql = "CALL AjouterReservation(:dateDebut, :dateFin, :lieu, :total, :idVoiture, :idUser)";
        try {
            $stmt = $this->db->prepare($sql);

            return $stmt->execute([
                ':dateDebut' => $this->dateDebut,
                ':dateFin'   => $this->dateFin,
                ':lieu'      => $this->lieuChange,
                ':total'     => $this->totalPrix,
                ':idVoiture' => $this->idVoiture,
                ':idUser'    => $this->idUser
            ]);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
        }
    }


    public function getReservationsByUser($userId)
    {
        // 1. La requête SQL (Zedt idVoiture bach nasta3mloha)
        $sql = "SELECT r.*, v.marque, v.modele, v.image 
            FROM reservations r
            JOIN voitures v ON r.idVoiture = v.idV
            WHERE r.idUser = :idUser
            ORDER BY r.idReservation DESC"; // Men l'a7san order by ID

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':idUser' => $userId]);

            // Kanjibo data 3adia (Tableau associatif)
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $reservationsObjects = [];

            foreach ($rows as $row) {

                $reservation = new Reservation();
                $reservation->setIdReservation($row['idReservation']);
                $reservation->setDateDebut($row['dateDebut']);
                $reservation->setDateFin($row['dateFin']);
                $reservation->setLieuChange($row['lieuChange']);
                $reservation->setStatus($row['status']);
                $reservation->setTotalPrix($row['totalPrix']);
                $reservation->setIdVoiture($row['idVoiture']);
                $reservation->setIdUser($row['idUser']);


                $voiture = new Voiture();

                $voiture->setMarqueV($row['marque']);
                $voiture->setModeleV($row['modele']);
                $voiture->setImageUrlV($row['image']);


                $reservation->setVoiture($voiture);


                $reservationsObjects[] = $reservation;
            }

            return $reservationsObjects;
        } catch (PDOException $e) {

            error_log("Erreur dans getReservationsByUser: " . $e->getMessage());
            return [];
        }
    }





    public function isVoitureAvailable($voitureId, $start, $end)
    {
        $sql = "SELECT COUNT(*) as count FROM reservations 
                WHERE idVoiture = :idV 
                AND status != 'annulee' AND ((dateDebut BETWEEN :start AND :end) OR (dateFin BETWEEN :start AND :end) OR (:start BETWEEN dateDebut AND dateFin)
                )";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([

            ':idV' => $voitureId,
            ':start' => $start,
            ':end' => $end
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] == 0;
    }

    public function getAllReservation()
    {
        $db = Database::getInstance()->getConnection();
        $sql = "SELECT r.*, v.marque, v.modele,v.image,u.email, u.name, u.LastName 
            FROM reservations r
            JOIN voitures v ON r.idVoiture = v.idV
            JOIN users u ON r.idUser = u.idUser
            ORDER BY r.idReservation DESC";
        try {
            $stmt = $db->query($sql);

            $resultat = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

            foreach ($resultat as $res) {
                $Client = new Client();
                $voiture = new Voiture();
                $Client->setName($res->name);
                $Client->setLastName($res->LastName);
                $Client->setEmail($res->email);
                $voiture->setMarqueV($res->marque);
                $voiture->setModeleV($res->modele);
                $voiture->setImageUrlV($res->image);
                $res->setClient($Client);
                $res->setVoiture($voiture);
            }
            return $resultat;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }
    public function updateStatus($id, $status): bool
    {
        $db = Database::getInstance()->getConnection();

        $sql = "UPDATE reservations set status = :status WHERE idReservation = :id";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':status', $status);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    static function getTotalRevenu(): float
    {
        $sql = "SELECT sum(totalPrix) from reservations where status != 'annulee'";
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->query($sql);
            $revenu = $stmt->fetchColumn();
            return $revenu;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return 0;
        }
    }

    public function annulerReservation($idReservation):bool
    {

        $sql = "UPDATE reservations  set status = 'annulee'  WHERE idReservation = :idRes ";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':idRes' => $idReservation
            ]);
         return true;
        } catch (PDOException $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
}
