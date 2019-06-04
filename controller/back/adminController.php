<?php

require_once('model/back/AdminManager.php');


function backConnexion($id, $pwd)
{
    $adminManager = new AdminManager();

    $dbPwd = $adminManager->checkId($id);

    if ($dbPwd[0] == hash('md5', $pwd))
    {
        session_start();
        $_SESSION['logged'] = true;
        header("Location: index.php?action=adminLog&name=index");
    }

    else {
        throw new Exception('Vos identifiants de session sont incorrects.<br>Pour un nouvel essai, <a href=\"index.php?action=page&name=connexion\">cliquer ici</a><br>');
    }
}

function newPost($title, $content)
{
    $adminManager = new AdminManager();

    $adminManager->addPost($title, $content);

    header("Location: index.php?action=adminLog&name=chapters");
}

function updatePost($title, $content, $id)
{
    $adminManager = new AdminManager();

    $adminManager->updatePostContent($title, $content, $id);

    header("Location: index.php?action=adminLog&name=chapters");
}

function deletePost($id)
{
    $adminManager = new AdminManager();

    $adminManager->deletePost($id);

    header("Location: index.php?action=adminLog&name=chapters");
}

function allowComment($id)
{
    $adminManager = new AdminManager();

    $adminManager->allowComment($id);

    header("Location: index.php?action=adminLog&name=comments");
}

function hideComment($id)
{
    $adminManager = new AdminManager();

    $adminManager->hideComment($id);

    header("Location: index.php?action=adminLog&name=comments");
}
