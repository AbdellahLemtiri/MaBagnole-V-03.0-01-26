<?php

namespace App\Models;

use App\Models\User;
use App\Config\Database;
use App\Utils\Logger;
use PDO;
use PDOException;

class Comment
{
    private $idComment;
    private $contenu;
    private $dateCommentaire;
    private $status;
    private $idArticle;
    private $idUser;
    
    private User $author;
    
    private $db;

    public function __construct()
    {
       $this->db = Database::getInstance();
    }

    public function getIdComment() { return $this->idComment; }
    public function setIdComment($id) { $this->idComment = $id; }

    public function getContenu() { return $this->contenu; }
    public function setContenu($contenu) { $this->contenu = htmlspecialchars($contenu); }

    public function getDateCommentaire() { return $this->dateCommentaire; }
    public function setDateCommentaire($date) { $this->dateCommentaire = $date; }

    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }

    public function getIdUser() { return $this->idUser; }
    public function setIdUser($id) { $this->idUser = $id; }

    public function getAuthor(): User { return $this->author; }
    public function setAuthor(User $user) { $this->author = $user; }


    public function getCommentsByArticle():array
    {
        $conn = $this->db->getConnection();

    
        $sql = "SELECT c.idComment, c.contenu, c.dateCommentaire, c.idUser, c.status, u.name, u.LastName FROM comments c JOIN users u ON c.idUser = u.idUser
                WHERE c.idArticle = ? AND c.status = 'active' AND u.status = 1
                ORDER BY c.dateCommentaire DESC";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->idArticle]);
            $comments = [];
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach ($results as $row) {
                $comment = new Comment();
                $comment->setIdComment($row->idComment);
                $comment->setContenu($row->contenu);
                $comment->setDateCommentaire($row->dateCommentaire);
                $comment->setStatus($row->status);
                $comment->setIdUser($row->idUser);
                $author = new User();
                $author->setIdUser($row->idUser);
                $author->setName($row->name);      
                $author->setLastName($row->LastName);
                $comment->setAuthor($author);
                $comments[] = $comment;
            }

            return $comments;
            
        } catch (PDOException $e) {
            Logger::log("Erreur getComments : " . $e->getMessage());
            return [];
        }
    }
}