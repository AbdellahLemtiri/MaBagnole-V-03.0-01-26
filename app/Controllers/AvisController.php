<?php

namespace App\Controllers;

use App\Models\Avis;

class AvisController
{

    public function addAvis()
    {
        if (isset($_POST['commentaire'], $_POST['note'], $_POST['idReservation'], $_POST['idUser']) && !empty($_POST['commentaire'])) {

            $commentaire = $_POST['commentaire'];
            $note =(int) $_POST['note'];
            $idReservation =(int) $_POST['idReservation'];
            $idUser = (int)$_POST['idUser'];
            $idVoiture = (int)$_POST['idVoiture'];
            $avis = new Avis();
            $avis->setCommentaire($commentaire);
            $avis->setNote($note);
            $avis->setIdReservation($idReservation);
            $avis->setIdClient($idUser);
            $avis->setIdVoiture($idVoiture);
            if ($avis->addAvis()) {
                header('Location: /MaBagnoleV1/reservationUser&msj=true');
                exit();
            } else {
                header('Location: /MaBagnoleV1/reservationUser&msj=false');
                exit();
            }
        }
    }
 

    public function updateAvis()
    {
        if ($_POST['action'] === 'updateAvis' && isset($_POST['idAvis'])) {

            $avis = new Avis();
            $idVoiture =(int) $_POST['idVoiture'];
            $idAvis = (int)$_POST['idAvis'];
            $note = (int)$_POST['note'];
            $commentaire = $_POST['commentaire'];
            $avis->setIdAvis($idAvis);
            $avis->setNote($note);
            $avis->setCommentaire($commentaire);
            if ($avis->updateAvis()) {
                header('Location: /MaBagnoleV1/CarDetaile?msg=true&id='.$idVoiture);
                exit();
            } else {
                header('Location: /MaBagnoleV1/CarDetaile?msg=false&id='.$idVoiture);
                exit();
            }
        } 
    }


      public function deleteAvis()
    {
        if ($_POST['action'] === 'deleteAvis' && isset($_POST['idAvis'])) {

            $avis = new Avis();
            $idVoiture = (int)$_POST['idVoiture'];
            $idAvis =(int) $_POST['idAvis'];
            $avis->setIdAvis($idAvis);
            if ($avis->softdelet()) {
                header('Location: /MaBagnoleV1/CarDetaile?msg=true&id='.$idVoiture);
                exit();
            } else {
                header('Location: /MaBagnoleV1/CarDetaile?msg=false&id='.$idVoiture);
                exit();
            }
        } 
    }
}
