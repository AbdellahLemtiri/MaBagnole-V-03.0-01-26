<?php

namespace App\Models;

use App\Database\Database;
use App\Utils\Logger;
use PDO;
use Exception;

class Voiture Extends Categorie
{
private int $idV ;
private string $modele;
private Float $prix_jour;
private string $disponibilite;
private string $matricule;
private string $image_url ;
private int  $places;
private string $carburant;
private string $categorie;


}   