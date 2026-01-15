<?php
session_start();
require_once __DIR__ . '/App/Autoloader.php';
App\Autoloader::register();

use public\api\listCarClient;
use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\VoitureController;
use App\Controllers\ReseravtionController;
use App\Controllers\AvisController;
use App\Controllers\ArticleController;
use App\Controllers\ThemeController;
use App\Controllers\ClientController;
use App\Controllers\CategorieController;
$CategorieController = new CategorieController();
$clientController = new ClientController();
$avisController = new AvisController();
$reseravtionController = new ReseravtionController();
$authController = new AuthController();
$adminController = new AdminController();
$voitureController = new VoitureController();
$articleController = new ArticleController();
$themeController = new ThemeController();
$action = $_POST['action'] ?? $_GET['action'] ?? 'auth';

switch ($action) {
    case 'index':
        break;
    case 'login':
        $authController->login();
        break;
    case 'signup':
        $authController->signup();
        break;
    /////////////////////////////////////
    case 'updateStatusRservation':
        $reseravtionController->updateStatusRsevation();
        break;
        case 'reservation':
        $adminController->getAllReservation();
        break;
    //////////////////////////////////////
    case 'addVoiture':
        $voitureController->setVoiture();
        break;
    case 'home':
        break;
    case 'carAdmin':
        $adminController->afficherDashboard();
        break;
    case 'update_voiture':
        $voitureController->updateVoiture();
        break;
    case 'delete_voiture':
        $voitureController->deleteVoiture();
        break;
    ///////////////////////////////////////////
    case 'categories':
        $adminController->openCategory();
        break;
    case 'delete_categorie':
        $CategorieController->supprimerCategorie();
        break;
    case 'add_categorie':
        $CategorieController->ajouterCategorie();
        break;
    case 'update_categorie':
        $CategorieController->modifierCategorie();
        break;
    //////////////////////////////////////////////
    case 'usersAdmin':
        $adminController->usersAdmin();
        break;
    case 'activate_user':
        $adminController->ActiveUser();
        break;
    case 'block_user':
        $adminController->desActiveUser();
        break;
    case 'carList':
        $voitureController->carList();
        break;
    case 'CarDetaile':
        $clientController->carDetaile();
        break;
    case 'paimentReservation':
        $reseravtionController->paimentReservation();
        break;
    case 'updateAvis':
        $avisController->updateAvis();
        break;
    case 'reservationUser':
        $clientController->ReservationClient();
        break;
    case 'addAvis':
        $avisController->addAvis();
        break;
    //////////////////////////////////////////
    case 'ArticleUser':
        $articleController->getAllArticleClient();
        break;
    case 'approveArticle':
        $articleController->approveArticle();
        break;
    case 'rejectArticle':
        $articleController->rejectArticle();
        break;
    case 'ArticleAdmin':
        $articleController->getAllArticleAdmin();
        break;
    case 'deleteArticle':
        $articleController->deleteArticle();
        break;
    /////////////////////////////////////////
    case 'themeAdmin':
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
    /////////////////////////////////////////////
    case 'tagsAdmin':
        $adminController->getAllTag();
        break;
    case 'addTags':
        $adminController->addTag();
        break;
    case 'updateTag':
        $adminController->updateTag();
        break;
    case 'deleteTag':
        $adminController->deletTag();
        break;
    ////////////////////////////////////////
    case 'updateTheme':
        $themeController->updateTheme();
        break;
    case 'addTheme':
        $themeController->addTheme();
        break;
    case 'deleteTheme':
        $themeController->deleteTheme();
        break;
    ///////////////////////////////////////////
    case 'themeClient':
        $clientController->pageThemeClient();
        break;
    case 'ArticleTheme':
        $clientController->ArticleTheme();
        break;
    case 'lireDetaileArticle':
        $clientController->DetaileArticleTheme();
        break;
    case 'saveArticle':
        $articleController->saveArticle();
        break;
    default:
        require_once __DIR__ . '/views/auth/auth.php';
        break;
}
