<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Theme;
use App\Models\Tag;

class ArticleController

{

    public function getAllArticleClient()
    {

        if (!isset($_SESSION['userId'])) {
            header('Location: index.php?action=auth');
            exit();
        } else {
            $idUser = $_SESSION['userId'];
            $articleModel = new Article();
            $themeModel = new Theme();
            $tagModel = new Tag();
            $articles = $articleModel->getAllPublished();
            $themes = $themeModel->getAllTheme();
            $tags = $tagModel->getAll();
            $articles = $articleModel->getAllPublished();
            $tags = $tagModel->getAll();
            require_once 'views/client/blog.php';
        }
    }

    public function getAllArticleAdmin()
    {
        $obj = new Article();
        $articles =  $obj->getAllArticle();
        $counArticlepublished = $obj->getCountArticlesPublished();
        $CountArticlesPending = $obj->getCountArticlesPending();
        require_once 'views/admin/article.php';
    }
    public function approveArticle()
    {
        if (isset($_POST['id']) && $_POST['action'] == "approveArticle") {
            $id = (int)$_POST['id'];
            $obj = new Article();
            $obj->setIdArticle($id);
            $obj->setStatus('published');
            if ($obj->updateStatus()) {
                header('Location: index.php?action=ArticleAdmin&msj=true');
                exit;
            } else {
                header('Location: index.php?action=ArticleAdmin&msj=false');
                exit;
            }
        } else {
            header('Location: index.php?action=ArticleAdmin&msj=incomplete');
            exit;
        }
    }

    public function addAticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idUser = $_SESSION['idUser'];
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $theme_id = $_POST['theme_id'];
            $statut = $_POST['statut'];
            $obj = new Article();
            $obj->setContenu($contenu);
            $obj->setTitre($titre);
        }
    }
    public function rejectArticle()
    {
        if (isset($_POST['id']) && $_POST['action'] == "rejectArticle") {
            $id = (int)$_POST['id'];
            $obj = new Article();
            $obj->setIdArticle($id);
            $obj->setStatus('rejected');
            if ($obj->updateStatus()) {
                header('Location: index.php?action=ArticleAdmin&msj=true');
                exit;
            } else {
                header('Location: index.php?action=ArticleAdmin&msj=false');
                exit;
            }
        } else {
            header('Location: index.php?action=ArticleAdmin&msj=incomplete');
            exit;
        }
    }
    public function deleteArticle()
    {
        if (isset($_POST['id']) && $_POST['action'] == "deleteArticle") {
            $id = (int)$_POST['id'];
            $obj = new Article();
            $obj->setIdArticle($id);
            if ($obj->deleteArticle()) {
                header('Location: index.php?action=ArticleAdmin&msj=true');
                exit;
            } else {
                header('Location: index.php?action=ArticleAdmin&msj=false');
                exit;
            }
        } else {
            header('Location: index.php?action=ArticleAdmin&msj=incomplete');
            exit;
        }
    }
    public function saveArticle()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'saveArticle') {
            $id = $_POST['id'];
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $theme_id = $_POST['theme_id'];
            $imagePath = null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $allowed = ['jpg', 'jpeg', 'png', 'webp'];
                $filename = $_FILES['image']['name'];
                $filetype = $_FILES['image']['type'];
                $filesize = $_FILES['image']['size'];


                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                if (!in_array($ext, $allowed)) {
                    header('Location: index.php?action=ArticleTheme&idTheme=' . $id . '&msj=formaInvalide');
                    exit;
                }
                if ($filesize > 4 * 1024 * 1024) {
                    header('Location: index.php?action=ArticleTheme&idTheme=' . $id . '&msj=tailleInvalide');
                    exit;
                }

                //  un nom unique pour 
                $newFilename = "article_" . uniqid() . "." . $ext;
                // Définir le dossier de destination
                $uploadDir = "images/";
                // Créer le dossier 
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $destination = $uploadDir . $newFilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {

                    $imagePath = $destination;
                } else {
                    header('Location: index.php?action=ArticleTheme&idTheme=' . $id . '&msj=ereurImage');
                    exit;
                }
            }


            
            $article = new Article();
            $article->setContenu($contenu);
            $article->setIdTheme($theme_id);
            $article->setTitre($titre);
            $article->setImageArticle($imagePath);
            $article->setidUser(1);
            if ($article->createArticle([])) {
                header('Location: index.php?action=ArticleTheme&idTheme=' . $id . '&msj=succes');
                exit;
            } else {
                header('Location: index.php?action=ArticleTheme&idTheme=' . $id . '&msj=ereurdb');
                exit;
            }

            
        
        }
    }
}
