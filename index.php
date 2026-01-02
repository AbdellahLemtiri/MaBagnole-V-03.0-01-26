<?php
// 1. ديما سبق Autoloader هو اللول
require_once __DIR__ . '/App/Autoloader.php';
App\Autoloader::register();

// 2. ضروري دير import للكلاس بالمسار الكامل ديالها
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

    case 'home':
    default:
        // تأكد أن المسار صحيح (واش views كاينة برا App؟)
        require_once __DIR__ . '/views/auth/index.php'; 
        break;
}
?>