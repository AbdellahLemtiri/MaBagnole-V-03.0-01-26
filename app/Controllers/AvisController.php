<?php

namespace App\Controllers;

use App\Models\Avis;

class AvisController
{

    public function addAvis()
    {
        if (isset($_POST['commentaire'], $_POST['note'], $_POST['idReservation'], $_POST['idUser']) && !empty($_POST['commentaire'])) {

            $commentaire = $_POST['commentaire'];
            $note = $_POST['note'];
            $idReservation = $_POST['idReservation'];
            $idUser = $_POST['idUser'];
            $idVoiture = $_POST['idVoiture'];
            $avis = new Avis();
            $avis->setCommentaire($commentaire);
            $avis->setNote($note);
            $avis->setIdReservation($idReservation);
            $avis->setIdClient($idUser);
            $avis->setIdVoiture($idVoiture);
            if ($avis->addAvis()) {
                header('Location: index.php?action=reservationUser&msj=vrai');
                exit();
            } else {
                header('Location: index.php?action=reservationUser&msj=faux');
                exit();
            }
        }
    }

    //idAvis note commentaire updateAvis

    public function updateAvis()
    {
        if ($_POST['action'] === 'updateAvis' && isset($_POST['idAvis'])) {

            $avis = new Avis();
            $idVoiture = $_POST['idVoiture'];
            $idAvis = $_POST['idAvis'];
            $note = $_POST['note'];
            $commentaire = $_POST['commentaire'];
            $avis->setIdAvis($idAvis);
            $avis->setNote($note);
            $avis->setCommentaire($commentaire);
            if ($avis->updateAvis()) {
                header('Location: index.php?action=CarDetaile&msj=updateAvisvrai&id='.$idVoiture);
                exit();
            } else {
                header('Location: index.php?action=CarDetaile&msj=UpdateAvisfaux&id='.$idVoiture);
                exit();
            }
        } else {
            header('Location: index.php?action=CarDetaile&msj=Incomplete&id=');
            exit();
        }
    }
}
