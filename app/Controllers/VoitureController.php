<?php

namespace App\Controllers;

use App\Models\Voiture;

class VoitureController
{

    public function getAllVoituresJson()
    {

        $voitures = Voiture::getAllVoitures();


        $data = [];
        foreach ($voitures as $v) {
            $data[] = $v->toArray();
        }

        ob_clean();
        header('Content-Type: application/json');

        echo json_encode([
            'status' => 'success',
            'count' => count($data),
            'data' => $data
        ]);
        exit;
    }

    public function carList()
    {
        require_once 'views/client/carList.php';
    }

    public function carDetaile()
    {

        if (isset($_POST['id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $v = new Voiture();
            $voiture = $v->getVoitureById($id);
            require_once 'views/client/carDetaile.php';
        }
    }
}
