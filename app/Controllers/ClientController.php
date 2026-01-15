<?php

namespace App\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Theme;
use App\Models\CommentArticle;
use App\Models\Voiture;
use App\Models\Avis;
use App\Models\Reservation;
class ClientController
{
   

    public function pageThemeClient()
    {
        $obj = new Theme();
        $themes = $obj->getAllTheme();
        require_once 'views/client/theme.php';
    }

    public function ArticleTheme()
    {
        $id = $_REQUEST['idTheme'] ?? null;

        if (!$id) {
            header('Location: /index.php');
            exit();
        }

        $themeModel = new Theme();
        $tagModel = new Tag();
        $articleModel = new Article();

        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
        $page = isset($_GET['page']) && (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $articleModel->setIdTheme($id);
        $totalArticles = $articleModel->getCountArticleTheme($id);
        $totalPages = ceil($totalArticles / $limit);


        $articles = $articleModel->getAllPublishedByTheme($limit, $offset);

        $themes = $themeModel->getAllTheme();
        $tags = $tagModel->getAll();
        //  Affichage
        require_once 'views/client/articles.php';
    }

    public function DetaileArticleTheme()
    {
        if (isset($_GET['idArticle']) && $_GET['action'] === 'lireDetaileArticle') {
            $idArticle = $_GET['idArticle'];
            $comments = (new CommentArticle())->getCommentsByArticle($idArticle);
            $theme = new Theme();
            $tag = new Tag();
            $tagsArticles =  $tag->getTagsByArticle($idArticle);
            $themes = $theme->getAllTheme();
            $obj = new Article();
            $obj->setIdArticle($idArticle);
            $article = $obj->getArticleById();
            require_once 'views/client/detaileArticle.php';
        }
    }

    public function carDetaile()
    {
        if (isset($_POST['id']) || isset($_GET['id'])) {
            $id = $_POST['id'] ?? $_GET['id'];
            $v = new Voiture();
            $comments =  (new Avis())->getAllAVisByIdVoiture($id);
            $voiture = $v->getVoitureById($id);
            require_once 'views/client/carDetaile.php';
        }
    }
       public function ReservationClient()
    {
        $reservationModel = new Reservation();
        $mesReservations = $reservationModel->getReservationsByUser($_SESSION['userId']);
        require_once 'views/client/reservation.php';
    }
}
