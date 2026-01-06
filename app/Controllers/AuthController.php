<?php
namespace App\Controllers; 
 
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Client.php';

use App\Models\User;
use App\Models\Client;

class AuthController {

    public function login() {
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['password'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $res = User::Login($email, $password);

            switch ($res) {
                case "erreur_technique":
                   
                    header('Location: index.php?action=404'); 
                    exit();

                case 'mot_de_passe_incorrect':
                    header('Location: index.php?action=auth&erreur=mot_de_passe_incorrect');
                    exit();
                case "email_introuvable":
                    header('Location: index.php?action=auth&erreur=email_introuvable');
                    exit();

                case "compte_bloque":
                    header('Location: index.php?action=auth&erreur=compte_bloque');
                    exit();
                case "admin":
                    header('Location: /MaBagnoleV1/index.php?action=carAdmin');
                    exit();

                case "client":
                    header('Location: /MaBagnoleV1/index.php?action=carList');
                    exit();
   
                default:
                    header('Location: index.php?action=auth&erreur=inconnu');
                    exit();
            }
        } else {
        
             header('Location: index.php?action=auth&erreur=empty_fields');
             exit();
        }
    }

    public function signup() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               
        
            if (!empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['password'])) {
            
                $obj = new Client();

                $name = $_POST['nom'];
                $lastName = $_POST['prenom'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phone = $_POST['phone'];

                if (!$obj->setName($name)) {
                    header('Location: index.php?action=auth&erreur=nomInvalide');
                    exit();
                }
                if (!$obj->setLastName($lastName)) {
                    header('Location: index.php?action=auth&erreur=lastnameInvalide');
                    exit();
                }
                if (!$obj->setPhone($phone)) {
                    header('Location: index.php?action=auth&erreur=phoneInvalide');
                    exit();
                }
                if (!$obj->setEmail($email)) {
                    header('Location: index.php?action=auth&erreur=emailInvalide');
                    exit();
                }
                if (!$obj->setPassword($password)) {
                    header('Location: index.php?action=auth&erreur=passwordInvalide');
                    exit();
                }
                if ($obj->signup()) {
                    header('Location: index.php?action=auth&success=compte_cree');
                    exit();
                } 
                else {
                    header('Location: index.php?action=auth&erreur=technique');
                    exit();
                }

            } else {         
                header('Location: index.php?action=auth&erreur=champs_vides');
                exit();
            }
        }
    }
}
?>