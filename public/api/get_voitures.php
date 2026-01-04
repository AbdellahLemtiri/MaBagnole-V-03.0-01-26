<?php

require_once '../../App/Autoloader.php';
use App\Autoloader;
Autoloader::register();
use App\Controllers\VoitureController;
$controller = new VoitureController();
$controller->getAllVoituresJson();
?>