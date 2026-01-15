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
                header('Location: index.php?action=themeAdmin&msj=true');
                exit;
            } else {
                header('Location: index.php?action=themeAdmin&msj=false');
                exit;
            }
        } else {
            header('Location: index.php?action=themeAdimn&msj=incomplete');
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
                header('Location: index.php?action=themeAdmin&msj=true');
                exit;
            } else {
                header('Location: index.php?action=themeAdmin&msj=false');
                exit;
            }
        } else {
            header('Location: index.php?action=themeAdimn&msj=incomplete');
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
                header('Location: index.php?action=themeAdmin&msj=true');
                exit;
            } else {
                header('Location: index.php?action=themeAdmin&msj=false');
                exit;
            }
        } else {
            header('Location: index.php?action=themeAdimn&msj=incomplete');
            exit;
        }
    }
}
