<?php

namespace App\Models;

use App\Config\Database;
use App\Utils\Logger;
use DateTime;
use Exception;
use App\Models\User;
use App\Models\Voiture;

use PDO;

class Avis
{

    private int $idAvis;
    private string $commentaire;
    private int $note;
    private string $datePublication;
    private int $status;
    private int $idReservation;
    private  int $idClient;
    private $db;
    private User $user;
    private int $idVoiture;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function setUser(User $user)
    {
        $this->user = $user;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function getIdAvis()
    {
        return $this->idAvis;
    }
    public function setIdAvis(int $idAvis)
    {
        $this->idAvis = $idAvis;
    }

    public function getCommentaire()
    {
        return $this->commentaire;
    }
    public function setCommentaire(string $commentaire)
    {
        $this->commentaire = $commentaire;
    }

    public function getNote()
    {
        return $this->note;
    }
    public function setNote(int $note)
    {
        $this->note = $note;
    }

    public function getDatePublication()
    {
        return $this->datePublication;
    }
    public function setDatePublication(string $datePublication)
    {
        $this->datePublication = $datePublication;
    }


    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus(int $status)
    {
        $this->status = $status;
    }


    public function getIdReservation()
    {
        return $this->idReservation;
    }
    public function setIdReservation(int $idReservation)
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
    

   public function getIdVoiture()  
    {
        return $this->idVoiture;
    }
    public function setIdVoiture($idVoiture)
    {
        $this->idVoiture = $idVoiture;
    }

    public function addAvis(): bool
    {
        $conn = $this->db->getConnection();
        $sql = "INSERT INTO avis (commentaire, note, status, idReservation, idClient,idVoiture) 
            VALUES (:commentaire, :note,1, :idRes, :idClient,:idVoiture)";


        try {

            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                ':commentaire' => $this->commentaire,
                ':note'        => $this->note,
                ':idRes'       => $this->idReservation,
                ':idClient'    => $this->idClient,
                ':idVoiture'    => $this->idVoiture
            ]);

            return $result;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
    public function softdelet(): bool
    {
        $conn = $this->db->getConnection();
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

    public function getAllAVisByIdVoiture($id): array
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT a.*, u.name, u.LastName,u.idUser 
            FROM avis a 
            INNER JOIN users u ON a.idClient = u.idUser 
            INNER JOIN voitures v ON a.idVoiture = v.idV 
            WHERE v.idV = :id AND a.status = 1";

        try {
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $lesAvis = [];
            foreach ($result as $res) {
                $avis = new Avis();
                $user = new User();
                $avis->setCommentaire($res['commentaire']);
                $avis->setDatePublication($res['datePublication']);
                $avis->setNote($res['note']);
                $avis->setIdAvis($res['idAvis']);
                $avis->setIdClient($res['idClient']);
                $avis->setIdVoiture($res['idVoiture']);
                $user->setLastName($res['LastName']);
                $user->setName($res['name']);
                $avis->setUser($user);

                $lesAvis[] = $avis;
            }

            return $lesAvis;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }


    
    public function updateAvis():bool
    {
        $conn = $this->db->getConnection();
        $sql = "UPDATE avis SET commentaire = :commentaire,note = :note WHERE idAvis = :id";

        try{
             $stmt = $conn->prepare($sql);
             $stmt->execute([
                ':id' => $this->idAvis,
                ':commentaire' => $this->commentaire,
                ':note' => $this->note
             ]);
             return true;
        }
        catch(Exception $e){
            Logger::log($e->getMessage());
            return false;
        }
    }

    public  function checkAvisUser(int $idClient, int $idAvis): bool
    {    
        $conn = $this->db->getConnection();
        $sql = "SELECT COUNT(*) FROM avis WHERE idAvis = :idAvis AND idClient = :idClient";
        
        try 
        {
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':idAvis', $idAvis, PDO::PARAM_INT);
            $stmt->bindValue(':idClient', $idClient, PDO::PARAM_INT);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count > 0;
        }
        catch (Exception $e) 
        {
            Logger::log($e->getMessage());
            return false;
        }
    }   
    

}
