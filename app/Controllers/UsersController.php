<?php
namespace App\Controllers;
use App\Models\Client;
use Exception;
use App\Utils\Logger;
class UsersController {

   public function ActiveUser()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && $_POST['action'] === 'activate_user') {

            $id = $_POST['id'];
            try {

                if ((new Client)->activateClient($id)) {
                    header("Location: /MaBagnoleV1/usersAdmin?msg=true");
                    exit;
                }
            } catch (Exception $e) {
                Logger::log($e->getMessage());

                header("Location: /MaBagnoleV1/usersAdmin?msg=false");
                exit;
            }
        }
    }

    public function desActiveUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && $_POST['action'] === 'block_user') {

            $id = $_POST['id'];
            try {
                if ((new Client)->blockClient($id)) {
                    header("Location: /MaBagnoleV1/usersAdmin?msg=true");
                    exit;
                }
            } catch (Exception $e) {
                Logger::log($e->getMessage());
                header("Location: /MaBagnoleV1/usersAdmin?msg=false");
                exit;
            }
        }
    }

}