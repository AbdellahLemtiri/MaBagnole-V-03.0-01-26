<?php

namespace App\Models;

use App\Models\User;
use App\Config\Database;
use App\Utils\Logger;
use PDO;
use PDOException;

class CommentArticle
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

    // Getters & Setters
    public function getIdComment() { return $this->idComment; }
    public function setIdComment($id) { $this->idComment = $id; }

    public function getContenu() { return $this->contenu; }
    public function setContenu($contenu) { $this->contenu = $contenu; }  

    public function getDateCommentaire() { return $this->dateCommentaire; }
    public function setDateCommentaire($date) { $this->dateCommentaire = $date; }

    public function getStatus() { return $this->status; }
    public function setStatus($status) { $this->status = $status; }

    public function getIdUser() { return $this->idUser; }
    public function setIdUser($id) { $this->idUser = $id; }

    public function getIdArticle() { return $this->idArticle; }
    public function setIdArticle($id) { $this->idArticle = $id; }

    public function getAuthor(): User { return $this->author; }
    public function setAuthor(User $user) { $this->author = $user; }
 
    public function getCommentsByArticle(): array
    {
        $conn = $this->db->getConnection();
       
        $sql = "SELECT c.*, u.name, u.LastName 
                FROM comments c 
                JOIN users u ON c.idUser = u.idUser
                WHERE c.idArticle = ? AND c.status = 'active' AND u.status = 1
                ORDER BY c.dateCommentaire DESC";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->idArticle]);
            $comments = [];
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
            
            foreach ($results as $row) {
                $comment = new CommentArticle();
                $comment->setIdComment($row->idComment);
                $comment->setContenu($row->contenu);
                $comment->setDateCommentaire($row->dateCommentaire);
                $comment->setStatus($row->status);
                $comment->setIdUser($row->idUser);
                $comment->setIdArticle($row->idArticle);
                
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
 
    public function addComment($idArticle, $idUser, $content)
    {
        $conn = $this->db->getConnection();
        $sql = "INSERT INTO comments (idArticle, idUser, contenu, dateCommentaire, status) VALUES (?, ?, ?, NOW(), 'active')";
        try {
            $stmt = $conn->prepare($sql);
            return $stmt->execute([$idArticle, $idUser, $content]);
        } catch (PDOException $e) {
            Logger::log("Erreur addComment : " . $e->getMessage());
            return false;
        }
    }
 
    public function updateComment($idComment, $content, $idUser)
    {
        $conn = $this->db->getConnection();
       
        $sql = "UPDATE comments SET contenu = ? WHERE idComment = ? AND idUser = ?";
        try {
            $stmt = $conn->prepare($sql);
            return $stmt->execute([$content, $idComment, $idUser]);
        } catch (PDOException $e) {
            Logger::log("Erreur updateComment : " . $e->getMessage());
            return false;
        }
    }

 
    public function deleteComment($idComment, $idUser)
    {
        $conn = $this->db->getConnection();
        $sql = "DELETE FROM comments WHERE idComment = ? AND idUser = ?";
        try {
            $stmt = $conn->prepare($sql);
            return $stmt->execute([$idComment, $idUser]);
        } catch (PDOException $e) {
            Logger::log("Erreur deleteComment : " . $e->getMessage());
            return false;
        }
    }
}