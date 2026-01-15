<?php

namespace App\Controllers;

use App\Models\CommentArticle;

class CommentController
{

    public function addCommentArticles()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['userId'])) {
                header('Location: home');
                exit();
            }
            $articleId = $_POST['article_id'];
            $content = trim($_POST['content']);
            $userId = $_SESSION['userId'];
            $commentModel = new CommentArticle();
            if ($commentModel->addComment($articleId, $userId, $content)) {
                header("Location:   lireDetaileArticle?msg=true&idArticle=" . $articleId);
                exit();
            } else {
                header("Location: /MaBagnoleV1/lireDetaileArticle?msg=false&idArticle=" . $articleId);
                exit();
            }
        }
    }
    public function editCommentArticles()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isset($_SESSION['userId'])) {
                header('Location: login');
                exit();
            }
            $commentId = $_POST['comment_id'];
            $articleId = $_POST['article_id'];
            $content = trim($_POST['content']);
            $userId = $_SESSION['userId'];

            $commentModel = new CommentArticle();;
            if ($commentModel->updateComment($commentId, $content, $userId)) {
                header("Location: /MaBagnoleV1/lireDetaileArticle?msg=true&idArticle=" . $articleId);
                exit();
            } else {
                header("Location: /MaBagnoleV1/lireDetaileArticle?msg=false&idArticle=" . $articleId);
                exit();
            }
        }
    }

    public function deleteCommentArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isset($_SESSION['userId'])) {
                header('Location: /MaBagnoleV1/home');
                exit();
            }
            $commentId = $_POST['comment_id'];
            $articleId = $_POST['article_id'];
            $userId = $_SESSION['userId'];
            $commentModel = new CommentArticle();
            if ($commentModel->deleteComment($commentId, $userId)) {
                header("Location: /MaBagnoleV1/lireDetaileArticle?msg=true&idArticle=" . $articleId);
                exit();
            } else {
                header("Location: /MaBagnoleV1/lireDetaileArticle?msg=false&idArticle=" . $articleId);
                exit();
            }
        }
    }
}
