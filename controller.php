<?php

require_once('model.php');

function listPosts()
{
    $postManager = new PostManager(); // Création de l'instance
    $posts = $postManager->getPosts(); // Appel de la méthode

    require('homeView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('postView.php');
}


// No closing tag on purpose
