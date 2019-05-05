<?php

require('model.php');

function listPosts()
{
    $posts = getPosts();

    require('homeView.php');
}

function post()
{
    $post = getPost($_GET['id']);

    require('postView.php');
}


// No closing tag on purpose
