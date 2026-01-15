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
    public function __construct()
    {
        CheckAuthController::checkClient();
    }
    public function carList()
    {
        require_once '../App/views/client/carList.php';
    }

    public function pageThemeClient()
    {
        $articles = (new Article())->getThreeLastArticles();
        $obj = new Theme();
        $themes = $obj->getAllTheme();
        require_once '../App/views/client/theme.php';
    }

    public function ArticleTheme()
    {
        $id = $_REQUEST['idTheme'];
        $themeModel = new Theme();
        $tagModel = new Tag();
        $articleModel = new Article();

        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
        $page = isset($_GET['page']) && (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $articleModel->setIdTheme((int)$id);
        $totalArticles = $articleModel->getCountArticleTheme((int)$id);
        $totalPages = ceil($totalArticles / $limit);


        $articles = $articleModel->getAllPublishedByTheme($limit, $offset);

        $themes = $themeModel->getAllTheme();
        $tags = $tagModel->getAll();

        require '../App/views/client/articles.php';
        require_once '../App/views/admin/includes/alerts.php';

    }

    public function DetaileArticleTheme()
    {
        if (isset($_GET['idArticle'])) {
            $idArticle = (int) $_GET['idArticle'];
            $comments = (new CommentArticle())->getCommentsByArticle((int)$idArticle);

            $theme = new Theme();
            $tag = new Tag();
            $tagsArticles =  $tag->getTagsByArticle((int)$idArticle);
            $themes = $theme->getAllTheme();
            $obj = new Article();
            $obj->setIdArticle((int)$idArticle);
            $article = $obj->getArticleById();
            require_once '../App/views/client/detaileArticle.php';
            require_once '../App/views/admin/includes/alerts.php';
        }
    }

    public function carDetaile()
    {
        if (isset($_POST['id']) || isset($_GET['id'])) {
            $id = $_POST['id'] ?? $_GET['id'];
            $v = new Voiture();
            $comments =  (new Avis())->getAllAVisByIdVoiture($id);
            $voiture = $v->getVoitureById($id);
            require_once '../App/views/client/carDetaile.php';
            require_once '../App/views/admin/includes/alerts.php';
        }
    }
    public function ReservationClient()
    {
        $reservationModel = new Reservation();
        $mesReservations = $reservationModel->getReservationsByUser($_SESSION['userId']);
        require_once '../App/views/client/reservation.php';
        require_once '../App/views/admin/includes/alerts.php';
    }

    
}
