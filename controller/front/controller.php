<?php

require_once('model/front/PostManager.php');
require_once('model/front/CommentManager.php');
require_once('model/front/PageManager.php');


// for homeView
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


// for postView

function postsNb()
{
    $postManager = new PostManager();

    $nbPosts = $postManager->countPosts();

    return $nbPosts;
}

function post()
{

    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $nbComments = $commentManager->countComments($_GET['id']);

    require('view/front/postView.php');
}

function signalComment($commentId)
{

    $commentManager = new CommentManager();

    $signal = $commentManager->signalComment($commentId);

    if ($checker === false)
    {
        throw new Exception('Error in signalling comment, sorry');
    }
    else {
        $initPost = $_GET['init_post'];
        header("Location: index.php?action=post&id=$initPost");
    }
}

function addComment($postId, $author, $message)
{

    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $message);

    if ($affectedLines === false)
    {
        throw new Exception('Error in adding comment, sorry');
    }
    else
    {
        header("Location: index.php?action=post&id=$postId");
    }
}


// for elseView

function chaptersList()
{

    $postManager = new PostManager();

    $posts = $postManager->listChapters();

    require('view/chapters.php');

}


function elseView($page)
{

    if ($page == "chapters")
    {
        $postManager = new PostManager();
        $pageManager = new PageManager();

        $posts = $postManager->listChapters();
        $page = $pageManager->displayChaptersPage($page, $posts);
    }

    else {
        $pageManager = new PageManager();

        $page = $pageManager->displayElsePage($page);
    }

}
