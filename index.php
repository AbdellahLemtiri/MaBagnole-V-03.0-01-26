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

$avisController = new AvisController();
$reseravtionController = new ReseravtionController();
$authController = new AuthController();
$adminController = new AdminController();
$voitureController = new VoitureController();
$articleController = new ArticleController;
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
    case 'addVoiture':
        $adminController->setVoiture();
        break;
    case 'home':
        break;
    case 'carAdmin':
        $adminController->afficherDashboard();
        break;
    case 'update_voiture':
        $adminController->updateVoiture();
        break;
    case 'delete_voiture':
        $adminController->deleteVoiture();
        break;
    case 'categories':
        $adminController->openCategory();
        break;
    case 'delete_categorie':
        $adminController->supprimerCategorie();
        break;
    case 'add_categorie':
        $adminController->ajouterCategorie();
        break;
    case 'update_categorie':
        $adminController->modifierCategorie();
        break;

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
        $voitureController->carDetaile();
        break;
    case 'paimentReservation':
        $reseravtionController->paimentReservation();
        break;
    case 'reservationUser':
        $reseravtionController->ReservationClient();
        break;

    case 'addAvis':
        $avisController->addAvis();
        break;
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
    default:
        require_once __DIR__ . '/views/auth/auth.php';
        break;
}
