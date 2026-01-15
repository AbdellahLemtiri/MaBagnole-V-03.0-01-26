<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Theme;
use App\Models\Tag;

class ArticleController

{




    public function approveArticle()
    {
        if (isset($_POST['id']) && $_POST['action'] == "approveArticle") {
            $id = (int)$_POST['id'];
            $obj = new Article();
            $obj->setIdArticle($id);
            $obj->setStatus('published');
            if ($obj->updateStatus()) {
                header('Location: /MaBagnoleV1/ArticleAdmin?msj=true');
                exit;
            } else {
                header('Location: /MaBagnoleV1/ArticleAdmin?msj=false');
                exit;
            }
        } else {
            header('Location: /MaBagnoleV1/ArticleAdmin?msj=incomplete');
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
                header('Location: /MaBagnoleV1/ArticleAdmin?msj=true');
                exit;
            } else {
                header('Location: /MaBagnoleV1/ArticleAdmin?msj=false');
                exit;
            }
        } else {
            header('Location: /MaBagnoleV1/ArticleAdmin?msj=incomplete');
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
                header('Location: /MaBagnoleV1/ArticleAdmin?msj=true');
                exit;
            } else {
                header('Location: /MaBagnoleV1/ArticleAdmin?msj=false');
                exit;
            }
        } else {
            header('Location: /MaBagnoleV1/ArticleAdmin?msj=incomplete');
            exit;
        }
    }
    public function saveArticle()
    {

        if (session_status() === PHP_SESSION_NONE) session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['theme_id'], $_POST['titre']) && $_POST['action'] === 'saveArticle') {


            $theme_id = (int)$_POST['theme_id'];
            $titre =  ($_POST['titre']);
            $contenu =  ($_POST['contenu']);


            $redirectId = $theme_id;

            $imagePath = '';


            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $allowed = ['jpg', 'jpeg', 'png', 'webp'];
                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));


                if (!in_array($ext, $allowed)) {
                    header('Location: /MaBagnoleV1/ArticleTheme?idTheme=' . $redirectId . '&msg=invalid_type');
                    exit();
                }


                if ($filesize > 8 * 1024 * 1024) {
                    header('Location: /MaBagnoleV1/ArticleTheme?idTheme=' . $redirectId . '&msg=too_large');
                    exit();
                }


                $newFilename = "article_" . uniqid() . "." . $ext;

                $uploadDir = "/assets/images/articles/";
 

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $destination = $uploadDir . $newFilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imagePath = $destination;
                } else {
                    header('Location: /MaBagnoleV1/ArticleTheme?idTheme=' . $redirectId . '&msg=upload_error');
                    exit();
                }
            }


            $article = new Article();
            $article->setTitre($titre);
            $article->setContenu($contenu);
            $article->setIdTheme($theme_id);
            $article->setImageArticle($imagePath);
            $article->setidUser($_SESSION['userId']);

            if ($article->createArticle()) {
                header('Location: /MaBagnoleV1/ArticleTheme?idTheme=' . $redirectId . '&msg=true');
                exit();
            } else {
                header('Location: /MaBagnoleV1/ArticleTheme?idTheme=' . $redirectId . '&msg=db_error');
                exit();
            }
        } else {

            $fallbackId = isset($_POST['theme_id']) ? $_POST['theme_id'] : '';
            header('Location: /MaBagnoleV1/ArticleTheme?idTheme=' . $fallbackId . '&msg=false');
            exit();
        }
    }
}
