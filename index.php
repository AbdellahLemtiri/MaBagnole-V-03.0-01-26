<?php
session_start(); 

define('BASE_PATH', __DIR__);
require_once __DIR__ . '/App/Autoloader.php';
App\Autoloader::register();

use App\Controllers\AuthController;
use App\Controllers\AdminController;

$authController = new AuthController();
$adminController = new AdminController(); 

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

    default:
        require_once __DIR__ . '/views/auth/auth.php';
        break;
}