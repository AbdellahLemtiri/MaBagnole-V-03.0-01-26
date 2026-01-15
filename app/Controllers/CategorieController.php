<?php
namespace App\Controllers;
use App\Models\Categorie;
class CategorieController
{
        public function ajouterCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add_categorie') {
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $icone = $_POST['icone'];

            $cat = new Categorie();
            $cat->setTitre($titre);
            $cat->setDescription($description);
            $cat->setIcone($icone);

            $cat->create();
            header("Location: index.php?action=categories");
            exit;
        }
    }

    public function modifierCategorie()
    {
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

            $cat->update();
            header("Location: index.php?action=categories");
            exit;
        }
    }


    public function supprimerCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete_categorie') {
            $id = $_POST['id'];
            $cat = new Categorie();
            $cat->setIdC($id);
            $cat->delete();
            header("Location: index.php?action=categories");
            exit;
        }
    }
}
 
