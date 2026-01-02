<?php

require_once __DIR__ . '/App/Autoloader.php';
App\Autoloader::register();


use App\Controllers\AuthController;


$authController = new AuthController();

$action = $_POST['action'] ?? $_GET['action'] ?? 'auth';

switch ($action) {
    case 'login':
        $authController->login();
        break;

    case 'signup':
        $authController->signup();
        break;
    case 'addVoiture':
        $authController->signup();
        break;
    case 'home':
        break;
    case 'indexadmin':
        require_once __DIR__ . '/views/admin/index.php';
        break;
    default:
        require_once __DIR__ . '/views/auth/index.php';
        break;
}
