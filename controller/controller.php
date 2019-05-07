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


// No closing tag on purpose
