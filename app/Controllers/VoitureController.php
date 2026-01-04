<?php
namespace App\Controllers;

use App\Models\Voiture;

class VoitureController {

    public function getAllVoituresJson() {
       
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
}