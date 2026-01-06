<?php
// --- 1. CONFIGURATION ---
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// --- 2. ACTIVER L'AUTOLOADER (Hada howa lmochkil 100%) ---

// A. Ila knti khdam b COMPOSER:
if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
    require_once __DIR__ . '/../../vendor/autoload.php';
} 
// B. Ila knti khdam b Autoloader MANUEL (dialek):
// (Ghaliban nta khdam b hada hit smitha MaBagnoleV1)
elseif (file_exists(__DIR__ . '/../../App/Autoloader.php')) {
    require_once __DIR__ . '/../../App/Autoloader.php';
    // Ila kant class smitha Autoloader:
    if (class_exists('App\Autoloader')) {
        \App\Autoloader::register(); 
    }
}
// C. Hel akher: Charge l classes b yeddek (Secours)
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