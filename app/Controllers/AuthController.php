<?php

namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Client.php';

use App\Models\User;
use App\Models\Client;

class AuthController
{

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email']) && !empty($_POST['password'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $res = User::Login($email, $password);

            switch ($res) {
                case "erreur_technique":
                    // Ila w93 chi mochkil f server
                    header('Location:/MaBagnoleV1/auth?error=server_error');
                    exit();

                case 'mot_de_passe_incorrect':
                    header('Location:/MaBagnoleV1/auth?error=wrong_password');
                    exit();

                case "email_introuvable":
                    header('Location:/MaBagnoleV1/auth?error=user_not_found');
                    exit();

                case "compte_bloque":
                    header('Location:/MaBagnoleV1/auth?error=account_blocked');
                    exit();

                case "admin":
                    header('Location:/MaBagnoleV1/carAdmin');
                    exit();

                case "client":
                    header('Location:/MaBagnoleV1/carList');
                    exit();

                default:
                    header('Location:/MaBagnoleV1/auth?error=unknown_error');
                    exit();
            }
        } else {
            header('Location:/MaBagnoleV1/auth?error=empty_fields');
            exit();
        }
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['password'])) {

                $obj = new Client();

                $name = $_POST['nom'];
                $lastName = $_POST['prenom'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phone = $_POST['phone'];


                if (!$obj->setName($name)) {
                    header('Location:/MaBagnoleV1/auth?error=invalid_name');
                    exit();
                }
                if (!$obj->setLastName($lastName)) {
                    header('Location:/MaBagnoleV1/auth?error=invalid_lastname');
                    exit();
                }
                if (!$obj->setPhone($phone)) {
                    header('Location:/MaBagnoleV1/auth?error=invalid_phone');
                    exit();
                }
                if (!$obj->setEmail($email)) {
                    header('Location:/MaBagnoleV1/auth?error=invalid_email');
                    exit();
                }
                if (!$obj->setPassword($password)) {
                    header('Location:/MaBagnoleV1/auth?error=invalid_password');
                    exit();
                }


                if ($obj->signup()) {
                    header('Location:/MaBagnoleV1/auth?success=account_created');
                    exit();
                } else {
                    header('Location:/MaBagnoleV1/auth?error=server_error');
                    exit();
                }
            } else {
                header('Location:/MaBagnoleV1/auth?error=empty_fields');
                exit();
            }
        }
    }

    public function logout()
    {
        User::logout();
        header('Location:/MaBagnoleV1/home');
    }
}
