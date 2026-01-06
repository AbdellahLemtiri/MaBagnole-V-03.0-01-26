<?php

namespace App\Models;

use App\Config\Database;
use PDOException;
use Exception;
use PDO;
use App\Utils\Logger;
class Reservation
{

    private $idReservation;
    private $dateDebut;
    private $dateFin;
    private $lieuChange;
    private $status;
    private $idVoiture;
    private $idUser;
    private $totalPrix;
   
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


    public function getIdReservation()
    {
        return $this->idReservation;
    }

    public function getDateDebut()
    {
        return $this->dateDebut;
    }
    public function setDateDebut($date)
    {
        $this->dateDebut = $date;
    }

    public function getDateFin()
    {
        return $this->dateFin;
    }
    public function setDateFin($date)
    {
        $this->dateFin = $date;
    }

    public function getLieuChange()
    {
        return $this->lieuChange;
    }
    public function setLieuChange($lieu)
    {
        $this->lieuChange = $lieu;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getIdVoiture()
    {
        return $this->idVoiture;
    }
    public function setIdVoiture($id)
    {
        $this->idVoiture = $id;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }
    public function setIdUser($id)
    {
        $this->idUser = $id;
    }


   public function ajouterReservation() {

    if ($this->dateFin <= $this->dateDebut) {
      Logger::log("reservation : La date de fin doit être supérieure à la date de début.");
    }

    
    $sql = "CALL AjouterReservation(:dateDebut, :dateFin, :lieu, :total, :idVoiture, :idUser)";
   try{
   $stmt = $this->db->prepare($sql);
    
    return $stmt->execute([
        ':dateDebut' => $this->dateDebut,
        ':dateFin'   => $this->dateFin,
        ':lieu'      => $this->lieuChange,
        ':total'     => $this->totalPrix,
        ':idVoiture' => $this->idVoiture,
        ':idUser'    => $this->idUser
    ]);

   }catch(Exception $e){
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
                AND status != 'annulee'
                AND (
                    (dateDebut BETWEEN :start AND :end) OR 
                    (dateFin BETWEEN :start AND :end) OR
                    (:start BETWEEN dateDebut AND dateFin)
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
}
