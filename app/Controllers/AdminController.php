<?php

namespace App\Controllers;
use App\Models\Voiture;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\Reservation;
use App\Models\Tag;
use App\Utils\Logger;
use Exception;
use App\Models\Theme;
use App\Models\Article;
use App\Controllers\CheckAuthController;

class AdminController
{

    public function __construct()
    {
        CheckAuthController::checkAdmin();
    }

    public function afficherDashboard()
    {
        $voitures = Voiture::getAllVoitures();
        require_once '../App/views/admin/car.php';
        require_once '../App/views/admin/includes/alerts.php';
    }


    public function getAllArticleAdmin()
    {
        $CountArticlesPending = (new Article())->getCountArticlesPending();
        $counArticlepublished = (new Article())->getCountArticlesPublished();
        $articles = (new Article())->getAllArticle();

        require_once '../App/views/admin/article.php';
        require_once '../App/views/admin/includes/alerts.php';
    }
    public function CategorieAdmin()
    {
        $categories = Categorie::getAll();
        require_once '../App/views/admin/categorie.php';
        require_once '../App/views/admin/includes/alerts.php';
    }



    public function usersAdmin()
    {
        $clients = Client::getAllClients();
        $countActif = Client::getCountUserActif();
        require_once '../App/views/admin/users.php';
        require_once '../App/views/admin/includes/alerts.php';
    }


    public function TagsAdmin()
    {
        $obj = new Tag();
        $tags =  $obj->getAll();
        require_once '../App/views/admin/tag.php';
        require_once '../App/views/admin/includes/alerts.php';
    }

    public function affichierToutThemeAdmin()
    {
        $obj = new Theme();
        $themes = $obj->getAllTheme();
        require_once '../App/views/admin/Theme.php';
        require_once '../App/views/admin/includes/alerts.php';
    }

    public function getAllReservation()
    {
        $resrvation = new Reservation();
        $getTotalRevenu = Reservation::getTotalRevenu();
        $reservations =   $resrvation->getAllReservation();
        require_once '../App/views/admin/dashboard.php';
        require_once '../App/views/admin/includes/alerts.php';
    }
}
