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
            $res->ajouterReservation();
            header("Location: index.php?action=carList&msg=reservie avec succes");
            exit;
        }
    }
    public function ReservationClient()
    {
        $reservationModel = new Reservation();
        $mesReservations = $reservationModel->getReservationsByUser($_SESSION['userId']);
        require_once 'views/client/reservation.php';
    }
}
