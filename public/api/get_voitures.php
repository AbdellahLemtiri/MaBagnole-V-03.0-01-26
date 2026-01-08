<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
    require_once __DIR__ . '/../../vendor/autoload.php';
} 

elseif (file_exists(__DIR__ . '/../../App/Autoloader.php')) {
    require_once __DIR__ . '/../../App/Autoloader.php';
    
    if (class_exists('App\Autoloader')) {
        \App\Autoloader::register(); 
    }
}

else {
    require_once __DIR__ . '/../../App/Config/Database.php';
    require_once __DIR__ . '/../../App/Models/Voiture.php';
    require_once __DIR__ . '/../../App/Controllers/VoitureController.php';
}

use App\Controllers\VoitureController;

try {

    $controller = new VoitureController();
    $controller->getAllVoituresJson();

} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine()
    ]);
}
?>