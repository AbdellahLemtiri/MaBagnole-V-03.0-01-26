<?php
define('BASE_PATH', __DIR__);
require_once __DIR__ . '/App/Autoloader.php';
App\Autoloader::register();


use App\Controllers\AuthController;
use App\Controllers\AdminController;

$authController = new AuthController();
$AdminController = new AdminController();
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
        $AdminController->setVoiture();
        break;
    case 'home':
        break;
    case 'carAdmin':
        $AdminController->afficherDashboard();
        break;
    case 'update_voiture':
        $AdminController->updateVoiture();
        break;
    case 'delete_voiture':
        $AdminController->deleteVoiture();
        break;
    case 'categories':
        $AdminController->openCategory();
        break;
    case 'delete_categorie':
        $AdminController->supprimerCategorie();
        break;
    case 'add_categorie':
        $AdminController->ajouterCategorie();
        break;
    case 'update_categorie':
        $AdminController->modifierCategorie();
        break;
    case 'usersAdmin';
        break;
    default:
        require_once __DIR__ . '/views/auth/auth.php';
        break;
}
