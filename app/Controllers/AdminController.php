<?php

namespace App\Controllers;
use App\Models\Voiture;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\Reservation;
use App\Models\Tag;
use App\Utils\Logger;
use Exception;
use App\Models\Theme;
class AdminController
{


   
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'update_voiture') {

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



    public function usersAdmin()
    {
        $clients = Client::getAllClients();
        $countActif = Client::getCountUserActif();
        require_once 'views/admin/users.php';
    }
    public function ActiveUser()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && $_POST['action'] === 'activate_user') {

            $id = $_POST['id'];
            try {

                if ((new Client)->activateClient($id)) {
                    header("Location: index.php?action=usersAdmin&msg=activated");
                    exit;
                }
            } catch (Exception $e) {
                Logger::log($e->getMessage());

                header("Location: index.php?action=usersAdmin&msg=error");
                exit;
            }
        }
    }

    public function desActiveUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && $_POST['action'] === 'block_user') {

            $id = $_POST['id'];
            try {
                if ((new Client)->blockClient($id)) {
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

    public function getAllTag()
    {
        $obj = new Tag();
        $tags =  $obj->getAll();
        require_once 'views/admin/tag.php';
    }
    public function addTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tags']) && $_POST['action'] === 'addTags') {

            $tagsAvecVerguel = $_POST['tags'];
            $tags = explode(',', $tagsAvecVerguel);
            try {
                foreach ($tags as $tag) {
                    $obj = new Tag();
                    $obj->setNomTag($tag);
                    $obj->create();
                }
                header("Location: index.php?action=tagsAdmin&msg=true");
                exit;
            } 
            catch (Exception $e) {
                Logger::log($e->getMessage());
                header("Location: index.php?action=tagsAdmin&msg=false");
                exit;
            }
        }else{
             header("Location: index.php?action=tagsAdmin&msg=incomplete");
                exit;
        }
    }

    public function deletTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'deleteTag') {
            $id = $_POST['id'];
            $tag = new Tag();
            $tag->setidTag($id);
            if ($tag->delete()) {
                header("Location: index.php?action=tagsAdmin&msg=true");
                exit;
            } else {
                header("Location: index.php?action=tagsAdmin&msg=false");
                exit;
            }
        }
        else{
             header("Location: index.php?action=tagsAdmin&msg=incomplete");
                exit;
        }
    }
    public function updateTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom']) && $_POST['action'] === 'updateTag') {
            $tag = new Tag();
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $tag->setidTag($id);
            $tag->setNomTag($nom);
             if ($tag->updateTag()) {
                header("Location: index.php?action=tagsAdmin&msg=true");
                exit;
            } else {
                header("Location: index.php?action=tagsAdmin&msg=false");
                exit;
            }
        }
        else{
             header("Location: index.php?action=tagsAdmin&msg=incomplete");
                exit;
        }
    }
 public function affichierToutThemeAdmin()
    {
        $obj = new Theme();
        $themes = $obj->getAllTheme();
        require_once 'views/admin/Theme.php';
    }

    public function getAllReservation() {
        $resrvation = new Reservation();
     $reservations =   $resrvation->getAllReservationsBY();
        require_once 'views/admin/dashboard.php';
    }

       public function reservationAdmin()
    {
        require_once 'views/admin/dashboard.php';
    }
}
