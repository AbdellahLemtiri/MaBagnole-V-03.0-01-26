<?php

namespace App\Models;

use App\Config\Database;
use App\Utils\Logger;
use DateTime;
use Exception;
use FFI\Exception as FFIException;

class Avis
{

    private int $idAvis;
    private string $commentaire;
    private int $note;
    private DateTime $datePublication;
    private int $status;
    private int $idReservation;
    private  int $idClient;


    public function getIdAvis()
    {
        return $this->idAvis;
    }
    public function setIdAvis($idAvis)
    {
        $this->idAvis = $idAvis;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function getNote()
    {
        return $this->note;
    }
    public function setNote($note)
    {
        $this->note = $note;
    }

    public function getDatePublication()
    {
        return $this->datePublication;
    }
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;
    }


    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }


    public function getIdReservation()
    {
        return $this->idReservation;
    }
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;
    }


    public function getIdClient()
    {
        return $this->idClient;
    }
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }



    public function addAvis(): bool
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "INSERT INTO avis (commentaire, note, status, idReservation, idClient) 
            VALUES (:commentaire, :note,1, :idRes, :idClient)";


        try {

            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                ':commentaire' => $this->commentaire,
                ':note'        => $this->note,
                ':idRes'       => $this->idReservation,
                ':idClient'    => $this->idClient
            ]);

            return $result;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
    public function softdelet():bool
    {
        $conn = Database::getInstance()->getConnection();
        $sql = "UPDATE avis set sataus = 0 Where idAvis = :id";

        try {

            $stmt = $conn->prepare($sql);
            $stmt->bindParm(':id', $this->idAvis);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
    
}
