<?php
session_start();

require_once __DIR__ . '/../../App/autoloader.php';

use App\Models\Favoris;
use App\Utils\Logger;

if (class_exists('App\Autoloader')) {
    \App\Autoloader::register();
}

header('Content-Type: application/json');


$json_input = file_get_contents('php://input'); 
$data = json_decode($json_input, true);
if (!isset($data['idV']) || empty($data['idV'])) {
    echo json_encode([
        'status' => 'error', 
        'message' => 'ID véhicule manquant'
    ]);
    exit;
}

try {
    $favorisModel = new Favoris();

    $favorisModel->setIdClient($_SESSION['userId']); 
    $favorisModel->setIdVoiture($data['idV']); 

    $actionResult = $favorisModel->toggle();

    echo json_encode([
        'status' => 'success',
        'action' => $actionResult 
    ]);

} catch (Exception $e) {
    if (class_exists('App\Utils\Logger')) {
        Logger::log($e->getMessage()); 
    }
    echo json_encode([
        'status' => 'error',
        'message' => 'Erreur serveur: ' . $e->getMessage()
    ]);
}