<?php

namespace App\Controllers;

use App\Models\Theme;

class ThemeController
{


    public function updateTheme()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['nom'])) {
            $obj = new Theme();
            $nom = $_POST['nom'];
            $descriptio = $_POST['description'];
            $icon = $_POST['icone'];
            $id = $_POST['id'];
            $obj->setNomTheme($nom);
            $obj->setDescription($descriptio);
            $obj->seticoneTheme($icon);
            $obj->setIdTheme($id);
            if ($obj->updateTheme()) {
                header('Location: /MaBagnoleV1/themeAdmin?msg=true');
                exit;
            } else {
                header('Location: /MaBagnoleV1/themeAdmin?msg=false');
                exit;
            }
        } else {
            header('Location: /MaBagnoleV1/themeAdimn?msg=incomplete');
            exit;
        }
    }
    public function addTheme()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $obj = new Theme();
            $nom = $_POST['nom'];
            $descriptio = $_POST['description'];
            $icon = $_POST['icone'];
            $obj->setNomTheme($nom);
            $obj->setDescription($descriptio);
            $obj->seticoneTheme($icon);

            if ($obj->createTheme()) {
                header('Location: /MaBagnoleV1/themeAdmin?msg=true');
                exit;
            } else {
                header('Location: /MaBagnoleV1/themeAdmin?msg=false');
                exit;
            }
        } else {
            header('Location: /MaBagnoleV1/themeAdimn?msg=incomplete');
            exit;
        }
    }

    public function deleteTheme()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && $_POST['action'] === 'deleteTheme') {

            $id = $_POST['id'];
            $theme = new Theme();
            $theme->setIdTheme($id);
            if ($theme->delete($id)) {
                header('Location: /MaBagnoleV1/themeAdmin?msg=true');
                exit;
            } else {
                header('Location: /MaBagnoleV1/themeAdmin?msg=false');
                exit;
            }
        } else {
            header('Location: /MaBagnoleV1/themeAdimn?msg=incomplete');
            exit;
        }
    }
}
