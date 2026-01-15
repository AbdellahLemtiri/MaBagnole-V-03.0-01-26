<?php

namespace App\Controllers;

use App\Models\Reservation;

class ReseravtionController
{
    public function  paimentReservation()
    {
        if (isset($_POST['idVoiture'], $_POST['Prixtotal'], $_POST['dateEnd'])) {
            $idVoiture  = $_POST['idVoiture'];
            $Prixtotal  = $_POST['Prixtotal'];
            $dateEnd  = $_POST['dateEnd'];
            $dateStart  = $_POST['dateStart'];
            $idUser  = $_POST['idUser'];
            $idVoiture  = $_POST['idVoiture'];
            $idVoiture  = $_POST['idVoiture'];
            $lieu  = $_POST['lieu'];
            //   (:dateDebut, :dateFin, :lieu, :total, :idVoiture, :idUser)

            $res = new Reservation();
            $res->setDateDebut($dateStart);
            $res->setDateFin($dateEnd);
            $res->setIdUser($idUser);
            $res->setIdVoiture($idVoiture);
            $res->setTotalPrix($Prixtotal);
            $res->setLieuChange($lieu);
            $res->addReseravtion();
            header("Location: index.php?action=carList&msg=reservie avec succes");
            exit;
        }
    }

    public function updateStatusRsevation()
    {
        if (isset($_POST['id_reservation']) && $_POST['action'] === 'updateStatusRservation') {
            $id = $_POST['id_reservation'];
            $status = $_POST['new_status'];
            $reservation = new Reservation();
            if ($reservation->updateStatus($id, $status)) {
                header("Location: index.php?action=reservation&msg=true");
                exit;
            } else {
                header("Location: index.php?action=reservation&msg=false");
                exit;
            }
        }
    }
}
