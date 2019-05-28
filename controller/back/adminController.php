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
        throw new Exception('Vos identifiants de session sont incorrects');
    }
}

function newPost($title, $content)
{
    $adminManager = new AdminManager();

    $adminManager->addPost($title, $content);

    header("Location: index.php?action=adminLog&name=chapters");
}

function deletePost($id)
{
    $adminManager = new AdminManager();

    $adminManager->deletePost($id);

    header("Location: index.php?action=adminLog&name=chapters");
}
