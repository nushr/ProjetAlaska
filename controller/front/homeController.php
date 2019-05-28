<?php

require_once('model/front/PostManager.php');
require_once('model/front/CommentManager.php');


function listPosts()
{
    $postManager = new PostManager(); // Création de l'instance

    $posts = $postManager->getPosts(); // Appel de la méthode

    require('view/front/homeView.php');
}

function commentsNb($postId)
{
    $commentManager = new CommentManager();

    $nbComments = $commentManager->countComments($postId);

    return $nbComments;
}

function lastComment()
{
    $commentManager = new CommentManager();

    $lastComment = $commentManager->getLastComment();

    return $lastComment;
}
