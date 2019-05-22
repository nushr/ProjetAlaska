<?php

require_once('model/back/BackManager.php');

function backConnexion($id, $pwd) {

    $backManager = new BackManager();

    $dbPwd = $backManager->checkId($id);

    if ($dbPwd[0] == hash('md5', $pwd))
    {
        session_start();
        $_SESSION['logged'] = true;
        header("Location: index.php?action=adminLog&name=index");
    }
    else {
        echo("FAUX");
    }

}

function setAdminHome($page)
{
    session_start();

    if (!isset($_SESSION['logged']))
    { ?>
        <div>Vous n'êtes pas identifié.</div>
        <div>Merci de vous connecter <a href="index.php?action=page&amp;name=connexion">ici</a></div>
        <?php
    }

    elseif ($page == "logout")
    {
        session_unset();
        session_destroy();
        header('Location:index.php');
    }
    elseif ($page == "chapters")
    {
        $backManager = new BackManager();

        $chapters = $backManager->listChapters();
    }

    else
    {
        $backManager = new BackManager();

        $page = $backManager->displayBackPage($page);

    }

}
