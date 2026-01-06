<?php

namespace App\Controllers;

use App\Models\Voiture;
use App\Models\Categorie;
use App\Models\Client;
use App\Utils\Logger;
use Exception;

class AdminController
{


    public function setVoiture()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['action'] === "addVoiture") {
            if (isset($_POST['modeles']) && is_array($_POST['modeles']) && isset($_POST['marques']) && is_array($_POST['marques'])) {

                $modeles = $_POST['modeles'];
                $marques = $_POST['marques'];
                $matricules = $_POST['matricules'];
                $prix = $_POST['prix'];
                $categories = $_POST['categories'];
                $boites = $_POST['boites'];
                $images = $_POST['images'];
                $places = $_POST['places'];
                $carburants = $_POST['carburants'];

                $successCount = 0;


                for ($i = 0; $i < count($modeles); $i++) {

                    try {
                        $v = new Voiture();
                        $v->setModeleV($modeles[$i]);
                        $v->setMarqueV($marques[$i]);
                        $v->setMatriculeV($matricules[$i]);
                        $v->setPrixJourV($prix[$i]);
                        $v->setIdCV($categories[$i]);
                        $v->setBoiteV($boites[$i]);
                        $v->setPlacesV($places[$i]);
                        $v->setCarburantV($carburants[$i]);
                        $v->setImageUrlV($images[$i]);
                        if ($v->ajouteVoiture()) {
                            $successCount = $successCount + 1;
                        }
                    } catch (Exception $e) {
                        logger::log($e->getMessage());
                        continue;
                    }
                }
            }
            header("Location: index.php?action=carAdmin&msg=" . $successCount . " voitures ajoutées avec succès");
            exit;
        }
    }
    public function afficherDashboard()
    {
        $voitures = Voiture::getAllVoitures();
        include 'views/admin/car.php';
    }

    public function deleteVoiture()
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $v = new Voiture();
            $v->setIdV($id);

            if ($v->deleteVoiture()) {

                header("Location: index.php?action=carAdmin&msg=Supprimé avec succès");
                exit;
            } else {
                header("Location: index.php?action=carAdmin&error=Erreur de suppression");
                exit;
            }
        } else {
            header("Location: index.php?action=carAdmin&error=Action non autorisée");
            exit;
        }
    }
    public function updateVoiture()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $v = new Voiture();
            $v->setIdV($_POST['id']);
            $v->setMarqueV($_POST['marque']);
            $v->setModeleV($_POST['modele']);
            $v->setMatriculeV($_POST['matricule']);
            $v->setPrixJourV($_POST['prix']);
            $v->setBoiteV($_POST['boite']);
            $v->setCarburantV($_POST['carburant']);
            $v->setStatusV($_POST['status']);
            $v->setImageUrlV($_POST['image']);
            $v->setIdCV($_POST['categorie_id']);

            if ($v->updateVoiture()) {
                header("Location: index.php?action=carAdmin&msg=Voiture modifiée avec succès");
            } else {
                header("Location: index.php?action=carAdmin&error=Erreur lors de la modification");
            }
            exit;
        }
    }

    public function openCategory()
    {
        $categories = Categorie::getAll();
        include 'views/admin/categorie.php';
    }


    public function ajouterCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $icone = $_POST['icone'];

            $cat = new Categorie();
            $cat->setTitre($titre);
            $cat->setDescription($description);
            $cat->setIcone($icone);

            $cat->create();
            header("Location: index.php?action=categories");
        }
    }

    public function modifierCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $icone = $_POST['icone'];

            $cat = new Categorie();
            $cat->setIdC($id);
            $cat->setTitre($titre);
            $cat->setDescription($description);
            $cat->setIcone($icone);

            $cat->update();
            header("Location: index.php?action=categories");
        }
    }


    public function supprimerCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $cat = new Categorie();
            $cat->setIdC($id);
            $cat->delete();
            header("Location: index.php?action=categories");
        }
    }
    public function usersAdmin()
    {
        $clients = Client::getAllClients();
        include 'views/admin/users.php';
    }
    public function ActiveUser()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            $id = $_POST['id']; 
            try {
              
                if ((new Client)->activateUser($id)) {
                    header("Location: index.php?action=usersAdmin&msg=activated");
                    exit;
                }
            }
            catch (Exception $e) {
                Logger::log($e->getMessage());
              
                header("Location: index.php?action=usersAdmin&msg=error");
                exit;
            }
        }
    }

    public function desActiveUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            $id = $_POST['id']; 
            try {
                if ((new Client)->blockUser($id)) {
                    header("Location: index.php?action=usersAdmin&msg=blocked");
                    exit;
                }
            } catch (Exception $e) {
                Logger::log($e->getMessage());
                header("Location: index.php?action=usersAdmin&msg=error");
                exit;
            }
        }
    }

}
