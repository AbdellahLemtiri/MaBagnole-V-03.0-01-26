<?php

use App\Autoloader;

session_start();
// 1. Autoloading
require_once __DIR__ . '/../App/Autoloader.php';
Autoloader::register();
//_______/------------/________//

use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\VoitureController;
use App\Controllers\ReseravtionController;
use App\Controllers\AvisController;
use App\Controllers\ArticleController;
use App\Controllers\ThemeController;
use App\Controllers\CategorieController;
use App\Controllers\HomeController;
use App\Controllers\UsersController;
use App\Controllers\TagController;
use App\Controllers\ClientController;
use App\Controllers\CommentController;
//_______________/------------/____________//


$commentController = new CommentController();
$TagController = new TagController();
$usersController = new UsersController();
$CategorieController = new CategorieController();
$avisController = new AvisController();
$reseravtionController = new ReseravtionController();
$authController = new AuthController();
$voitureController = new VoitureController();
$articleController = new ArticleController();
$themeController = new ThemeController();
$homeController = new HomeController();

$url = $_GET['url'];

$url = rtrim($url, '/');
$action = explode('/', $url)[0];

switch ($action) {
    // === AUTH ===  //
    case 'auth':
        require_once __DIR__ . '/../App/views/auth/auth.php';
        break;
    case 'login':
        $authController->login();
        break;
    case 'signup':
        $authController->signup();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'home':
        $homeController->pageHome();
        break;

    // === RESERVATION ===  //

    case 'updateStatusRservation':
        $reseravtionController->updateStatusRsevation();
        break;
    case 'reservation':
        $adminController = new AdminController();
        $adminController->getAllReservation();
        break;
    case 'reservationUser':
        $clientController = new ClientController();

        $clientController->ReservationClient();
        break;
    case 'paimentReservation':
        $reseravtionController->paimentReservation();
        break;
    case 'cancelReservation':
        $reseravtionController->cancelReservation();
        break;

    // === VOITURE === //

    case 'addVoiture':
        $voitureController->setVoiture();
        break;
    case 'carAdmin':
        $adminController = new AdminController();

        $adminController->afficherDashboard();
        break;
    case 'update_voiture':
        $voitureController->updateVoiture();
        break;
    case 'delete_voiture':
        $voitureController->deleteVoiture();
        break;
    case 'carList':
        $clientController = new ClientController();

        $clientController->carList();
        break;
    case 'CarDetaile':
        $clientController = new ClientController();

        $clientController->carDetaile();
        break;

    // === CATEGORIES === //


    case 'categories':
        $adminController = new AdminController();

        $adminController->CategorieAdmin();
        break;
    case 'deleteCategorie':
        $CategorieController->deleterCategorie();
        break;
    case 'AddUpdateCategorie':
        $CategorieController->AddUpdateCategorie();
        break;


    // === USERS === //
    case 'usersAdmin':
        $adminController = new AdminController();
        $adminController->usersAdmin();
        break;
    case 'activate_user':
        $usersController->ActiveUser();
        break;
    case 'block_user':
        $usersController->desActiveUser();
        break;

    // === AVIS ===  //
    case 'updateAvis':
        $avisController->updateAvis();
        break;
    case 'addAvis':
        $avisController->addAvis();
        break;
    case 'deleteAvis':
        $avisController->deleteAvis();
        break;
    // === ARTICLES ===  //
    case 'approveArticle':
        $articleController->approveArticle();
        break;
    case 'rejectArticle':
        $articleController->rejectArticle();
        break;
    case 'ArticleAdmin':
        $adminController = new AdminController();

        $adminController->getAllArticleAdmin();
        break;
    case 'deleteArticle':
        $articleController->deleteArticle();
        break;
    case 'saveArticle':
        $articleController->saveArticle();
        break;

    // === THEMES ===  //
    case 'themeAdmin':
        $adminController = new AdminController();

        $adminController->affichierToutThemeAdmin();
        break;
    case 'updateTheme':
        $themeController->updateTheme();
        break;
    case 'addTheme':
        $themeController->addTheme();
        break;
    case 'deleteTheme':
        $themeController->deleteTheme();
        break;
    case 'themeClient':
        $clientController = new ClientController();

        $clientController->pageThemeClient();
        break;
    case 'ArticleTheme':
        $clientController = new ClientController();
        $clientController->ArticleTheme();
        break;
    case 'lireDetaileArticle':
        $clientController = new ClientController();

        $clientController->DetaileArticleTheme();
        break;

    // === TAGS ===  //

    case 'tagsAdmin':
        $adminController = new AdminController();

        $adminController->TagsAdmin();
        break;
    case 'addTags':
        $TagController->addTag();
        break;
    case 'updateTag':
        $TagController->updateTag();
        break;
    case 'deleteTag':
        $TagController->deletTag();
        break;

    //_______/------------/________//
    // ========== COMMONT  ============ //
    case 'addCommentArticles':
        $commentController->addCommentArticles();
        break;
    case 'editCommentArticles':
        $commentController->editCommentArticles();
        break;
    case 'deleteCommentArticle':
        $commentController->deleteCommentArticle();
        break;
    //_______/------------/________//
    case '404':
        require_once __DIR__ . '/../App/views/erreurs/404.php';
        break;
    default:
        require_once __DIR__ . '/../App/views/erreurs/404.php';
        break;
}
