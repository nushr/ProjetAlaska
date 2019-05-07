<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création de l'instance
    $posts = $postManager->getPosts(); // Appel de la méthode

    require('view/homeView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $nbComments = $commentManager->countComments($_GET['id']);

    require('view/postView.php');
}

function postComment($postId, $author, $message)
{

    $affectedLines = postComment($postId, $author, $message);

    if ($affectedLines === false)
    {
        throw new Exception('Erreur dans le ajout du commentaire');
    }
    else
    {
        header('Location : index.php?action=post&id=' . $postId);
    }
}

// No closing tag on purpose
