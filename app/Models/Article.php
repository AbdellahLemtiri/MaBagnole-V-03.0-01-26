<?php

namespace App\Models;

use App\Config\Database;
use App\Models\Theme;
use App\Models\User;
use App\Models\Tag;
use App\Utils\Logger;

use PDO;
use Exception;
use PDOException;

class Article
{

    private int $idArticle;
    private string $titre;
    private string $contenu;
    private string $imageArticle;
    private string $dateCreation;
    private string $status;
    private int $idTheme;
    private string $nomTheme;
    private int $idUser;
    private string $name;
    private string $LastName;
    private $db;
    private Theme $theme;
    private Client $author;
    private array $tags;




    public function __construct()
    {

        $this->db = Database::getInstance();
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getTheme(): Theme
    {
        return $this->theme;
    }

    public function getAuthor(): Client
    {
        return $this->author;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getLastName(): string
    {
        return $this->LastName;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
    public function setStatus(string $status)
    {
        $this->status = $status;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function setIdTheme(int $idTheme)
    {
        $this->idTheme = $idTheme;
    }
    public function getIdTheme(): int
    {
        return $this->idTheme;
    }


    public function setLastName(string $LastName): void
    {
        $this->LastName = $LastName;
    }
    public function setNomTheme(string $nomTheme)
    {
        $this->nomTheme = $nomTheme;
    }
    public function getNomTheme(): string
    {
        return $this->nomTheme;
    }
    public function getIdArticle(): int
    {
        return $this->idArticle;
    }
    public function setIdArticle(int $id): void
    {
        $this->idArticle = $id;
    }
    public function getidUser(): int
    {
        return $this->idUser;
    }
    public function setidUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }
    public function getTitre(): string
    {
        return $this->titre;
    }
    public function getDateCreation()
    {
        return $this->dateCreation;
    }
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }
    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function getImageArticle(): string
    {
        return $this->imageArticle;
    }
    public function setImageArticle(string $img): void
    {
        $this->imageArticle = $img;
    }

    public function createArticle($tags = []): bool
    {

        try {
            $conn = $this->db->getConnection();
            $sql = "INSERT INTO articles (titre, contenu, imageArticle, idTheme, idUser, status) 
                VALUES (?, ?, ?, ?, ?, 'pending')";
            try {
                $stmt = $conn->prepare($sql);
                $res = $stmt->execute([
                    $this->titre,
                    $this->contenu,
                    $this->imageArticle,
                    $this->idTheme,
                    $this->idUser,
                ]);

                return $res;
            } catch (Exception $e) {
                Logger::log($e->getMessage());
                return false;
            }
            try {
                $idArticle = $conn->lastInsertId();
                if (!empty($tags)) {
                    $sqlTag = "INSERT INTO article_tags (idArticle, idTag) VALUES (?, ?)";
                    $stmtTag = $conn->prepare($sqlTag);
                    foreach ($tags as $idTag) {
                        $stmtTag->execute([$idArticle, $idTag]);
                    }
                }
            } catch (Exception $e) {
                Logger::log($e->getMessage());
                return false;
            }

            return true;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
        return true;
    }

    public function getAllPublished(): array
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT a.*, t.nomTheme, t.iconeTheme, u.name, u.LastName, u.phone 
            FROM articles a 
            JOIN themes t ON a.idTheme = t.idTheme 
            JOIN users u ON a.idUser = u.idUser";

        $stmt = $conn->query($sql);
        $articles = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

        foreach ($articles as $art) {

            $themeObj = new Theme();
            $themeObj->setIdTheme($art->idTheme);
            $themeObj->setNomTheme($art->nomTheme);
            $themeObj->seticoneTheme($art->iconeTheme);
            $art->theme = $themeObj;


            $clientObj = new Client();
            $clientObj->setName($art->name);
            $clientObj->setLastName($art->LastName);
            $art->author = $clientObj;
        }

        return $articles;
    }

    public function getAllArticle()
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT a.*,t.nomTheme, u.name, u.LastName
                FROM articles a 
                JOIN themes t ON a.idTheme = t.idTheme
                JOIN users u ON a.idUser = u.idUser
                ORDER BY a.dateCreation DESC";
        try {
            $stmt = $conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_CLASS, Article::class);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }

    public function updateStatus(): bool
    {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE articles SET status = ? WHERE idArticle = ?");
        return $stmt->execute([$this->getStatus(), $this->getIdArticle()]);
    }

    public function deleteArticle(): bool
    {
        $conn = $this->db->getConnection();
        $sql = "DELETE FROM articles WHERE idArticle = :id";
        try {
            $stmt = $conn->prepare($sql);

            $stmt->execute([':id' => $this->idArticle]);
            return true;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }



    public function getAllArticleByTheme(): array
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM articles a left join themes t on a.`idTheme`= t.`idTheme` LEFT join article_tags art on art.`idArticle` = a.`idArticle` WHERE a.`idTheme` = :idtheme";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->idTheme]);
            return  $stmt->fetchAll(PDO::FETCH_CLASS, Article::class);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }
    public function getCountArticleTheme(int $idtheme)
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT count(*) as count FROM articles  a INNER JOIN themes  t on a.idTheme = t.idTheme where a.idTheme = :id ";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id' => $idtheme]);
            $count = $stmt->fetch()['count'];
            return $count;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return 0;
        }
    }
    public function getAllPublishedByTheme(int $limit, int $offset): array
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT a.*, t.nomTheme, t.iconeTheme, u.name, u.LastName, u.email 
            FROM articles a 
            JOIN themes t ON a.idTheme = t.idTheme 
            JOIN users u ON a.idUser = u.idUser 
            WHERE t.idTheme = :idtheme 
            LIMIT :limitt OFFSET :offset"; // Beddelt l-tartib (Standard)

        try {
            $stmt = $conn->prepare($sql);

            // Hna l-sir: Khdem b bindValue bach t-specifi raqam (PARAM_INT)
            $stmt->bindValue(':idtheme', (int)$this->idTheme, PDO::PARAM_INT);
            $stmt->bindValue(':limitt', (int)$limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

            $stmt->execute();

            // PDO::FETCH_CLASS kat-fiyyet l-data l-objet
            $articles = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

            foreach ($articles as $art) {
                // Khidma d les objets (Theme & Client) rak dertiha mzyan
                $themeObj = new Theme();
                $themeObj->setIdTheme($art->idTheme);
                $themeObj->setNomTheme($art->nomTheme);
                $themeObj->seticoneTheme($art->iconeTheme);
                $art->theme = $themeObj;

                $clientObj = new Client();
                $clientObj->setName($art->name);
                $clientObj->setLastName($art->LastName);
                if (isset($art->email)) {
                    $clientObj->setEmail($art->email);
                }
                $art->author = $clientObj;
            }
            return $articles;
        } catch (Exception $e) {
            Logger::log("Erreur dans getAllPublishedByTheme : " . $e->getMessage());
            return [];
        }
    }

    public function getArticleById(): Article | bool
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT a.*, t.nomTheme, t.iconeTheme, u.name, u.LastName, u.email 
            FROM articles a 
            JOIN themes t ON a.idTheme = t.idTheme 
            JOIN users u ON a.idUser = u.idUser 
            WHERE a.idArticle = ? LIMIT 1";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->idArticle]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
            $article = $stmt->fetch();

            if ($article) {

                $themeObj = new Theme();
                $themeObj->setIdTheme($article->idTheme);
                $themeObj->setNomTheme($article->nomTheme);
                $themeObj->seticoneTheme($article->iconeTheme);
                $article->theme = $themeObj;

                $clientObj = new Client();
                $clientObj->setName($article->name);
                $clientObj->setLastName($article->LastName);
                $clientObj->setEmail($article->email);

                $article->author = $clientObj;

                return $article;
            }

            return false;
        } catch (Exception $e) {
            Logger::log("Erreur dans getArticleById : " . $e->getMessage());
            return false;
        }
    }
    public function getThreeLastArticles(): array
    {
        $coon = $this->db->getConnection();
        $sql = "SELECT * FROM articles order by `idArticle` ASC limit 3";
        try {
            $stmt =  $coon->query($sql);
            $res = $stmt->fetchAll(PDO::FETCH_CLASS, Article::class);
            return $res;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return [];
        }
    }

    public function getCountArticlesPublished():int 
    {
        $conn=$this->db->getConnection();
        $sql = "SELECT count(*) as nombre FROM articles WHERE status = 'published' ";
        try{
           $stmt = $conn->query($sql);
          $count = $stmt->fetchColumn();
          return $count;
        }catch(Exception $e){
            Logger::log($e->getMessage());
            return 0;
        }
    }


      public function getCountArticlesPending():int 
    {
        $conn=$this->db->getConnection();
        $sql = "SELECT count(*) as nombre FROM articles WHERE status = 'pending' ";
        try{
           $stmt = $conn->query($sql);
          $count = $stmt->fetchColumn();
          return $count;
        }catch(Exception $e){
            Logger::log($e->getMessage());
            return 0;
        }
    }
}
