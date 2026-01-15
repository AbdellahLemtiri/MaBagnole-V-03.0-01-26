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
        $sql = "SELECT r.*, v.marque, v.modele, v.image 
                FROM reservations r
                JOIN voitures v ON r.idVoiture = v.idV
                WHERE r.idUser = :idUser
                ORDER BY r.dateDebut DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':idUser' => $userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function getAllReservations()
    {
        $db = Database::getInstance()->getConnection();
        $sql = "SELECT r.*, v.marque, v.modele, u.nom, u.prenom 
                FROM reservations r
                JOIN voitures v ON r.idVoiture = v.idV
                JOIN users u ON r.idUser = u.idUser
                ORDER BY r.idReservation DESC";

        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function getAllReservationsBY()
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
        } 
        catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }
    public function updateStatus($id,$status) : bool
    {
        $db = Database::getInstance()->getConnection();

        $sql = "UPDATE reservations set status = :status WHERE idReservation = :id";
        try {
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':status',$status );
        $stmt->bindValue(':id',$id );
        $stmt->execute();
        return true;
        }catch(Exception $e){
            Logger::log($e->getMessage());
            return false;
        }
    }
}
