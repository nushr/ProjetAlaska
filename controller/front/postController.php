<?php

require_once('model/front/PostManager.php');
require_once('model/front/CommentManager.php');


function postsNb()
{
    $postManager = new PostManager();

    $nbPosts = $postManager->countPosts();

    return $nbPosts;
}

function post() // pick & display
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
