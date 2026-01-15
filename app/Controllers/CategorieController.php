<?php

namespace App\Controllers;

use App\Models\Categorie;

class CategorieController
{
    public function AddUpdateCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add_categorie') {
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $icone = $_POST['icone'];

            $cat = new Categorie();
            $cat->setTitre($titre);
            $cat->setDescription($description);
            $cat->setIcone($icone);

            if ($cat->create()) {
                header("Location: /MaBagnoleV1/categories?msg=true");
                exit;
            } else {
                header("Location: /MaBagnoleV1/categories?msg=false");
                exit;
            }
        }
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'update_categorie') {
            $id = $_POST['id'];
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $icone = $_POST['icone'];

            $cat = new Categorie();
            $cat->setIdC($id);
            $cat->setTitre($titre);
            $cat->setDescription($description);
            $cat->setIcone($icone);

            if ($cat->update()) {
                header("Location: /MaBagnoleV1/categories?msg=true");
                exit;
            } else {
                header("Location: /MaBagnoleV1/categories?msg=false");
                exit;
            }
        }
    }

  


    public function deleterCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'deleteCategorie') {
            $id = $_POST['id'];
            $cat = new Categorie();
            $cat->setIdC($id);
            if ($cat->delete()) {
                header("Location: /MaBagnoleV1/categories?msj=true");
                exit;
            } else {
                header("Location: /MaBagnoleV1/categories?msj=false");
                exit;
            }
        }
    }
}
