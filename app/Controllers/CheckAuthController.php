<?php
namespace App\Controllers;

class CheckAuthController {
 
    private static function init() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

   
    public static function isLogged() {
        self::init();
        return isset($_SESSION['userId']) && isset($_SESSION['userRole']);
    }

   
    public static function checkAdmin() {
        self::init();

        if (!self::isLogged()) {
            header('Location: /MaBagnoleV1/404');
            exit();
        }

        
        if ($_SESSION['userRole'] !== 'admin') {
            header('Location: /MaBagnoleV1/404'); 
            exit();
        }
    }

    public static function checkClient() {
        self::init();

        if (!self::isLogged()) {
            header('Location: /MaBagnoleV1/login');
            exit();
        }


        if ($_SESSION['userRole'] !== 'client') {
            header('Location: /MaBagnoleV1/404');
            exit();
        }
    }
}