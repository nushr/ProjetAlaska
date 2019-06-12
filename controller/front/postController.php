<?php

require_once('model/front/PostManager.php');
require_once('model/front/CommentManager.php');


function postsNb() // counts posts
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

    if (is_null($post['id']))
    {
        throw new Exception('Ce chapitre n\'existe pas.');
    }
    else
    {
        require('view/front/postView.php');
    }
}

function getLastPostId() // for navigation menu on post reading
{
    $postManager = new PostManager();

    $lastPost = $postManager->getLastPostId();

    return $lastPost;
}

function getNextPostId($currentId) // for navigation menu on post reading
{
    $postManager = new PostManager();

    $nextPost = $postManager->getNextPostId($currentId);

    return $nextPost;
}

function getPrevPostId($currentId) // for navigation menu on post reading
{
    $postManager = new PostManager();

    $prevPost = $postManager->getPrevPostId($currentId);

    return $prevPost;
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

    if ($affectedLines === false) // checks if db insert worked
    {
        throw new Exception('Error in adding comment, sorry');
    }
    else
    {
        header("Location: index.php?action=post&id=$postId");
    }
}
