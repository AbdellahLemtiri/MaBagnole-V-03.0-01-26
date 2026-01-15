<?php

namespace App\Controllers;

use App\Models\Tag;
use Exception;
use App\Utils\Logger;

class TagController
{
    public function addTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tags']) && $_POST['action'] === 'addTags') {

            $tagsAvecVerguel = $_POST['tags'];
            $tags = explode(',', $tagsAvecVerguel);
            try {
                foreach ($tags as $tag) {
                    $obj = new Tag();
                    $obj->setNomTag($tag);
                    $obj->create();
                }
                header("Location: /MaBagnoleV1/tagsAdmin?msg=true");
                exit;
            } catch (Exception $e) {
                Logger::log($e->getMessage());
                header("Location: /MaBagnoleV1/tagsAdmin?msg=false");
                exit;
            }
        } else {
            header("Location: /MaBagnoleV1/tagsAdmin?msg=incomplete");
            exit;
        }
    }

    public function deletTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'deleteTag') {
            $id = $_POST['id'];
            $tag = new Tag();
            $tag->setidTag($id);
            if ($tag->delete()) {
                header("Location: /MaBagnoleV1/tagsAdmin?msg=true");
                exit;
            } else {
                header("Location: /MaBagnoleV1/tagsAdmin?msg=false");
                exit;
            }
        } else {
            header("Location: /MaBagnoleV1/tagsAdmin&msg=incomplete");
            exit;
        }
    }
    public function updateTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom']) && $_POST['action'] === 'updateTag') {
            $tag = new Tag();
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $tag->setidTag($id);
            $tag->setNomTag($nom);
            if ($tag->updateTag()) {
                header("Location: /MaBagnoleV1/tagsAdmin?msg=true");
                exit;
            } else {
                header("Location: /MaBagnoleV1/tagsAdmin?msg=false");
                exit;
            }
        } else {
            header("Location: /MaBagnoleV1/tagsAdmin?msg=incomplete");
            exit;
        }
    }
}
