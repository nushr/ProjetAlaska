<?php

require_once('model/back/BackManager.php');

function backConnexion($id, $pwd) {

    $backManager = new BackManager();

    $dbPwd = $backManager->checkId($id);

    if ($dbPwd[0] == hash('md5', $pwd))
    {
        session_start();
        $_SESSION['logged'] = true;
        header("Location: index.php?action=backHome");
    }
    else {
        echo("FAUX");
    }

}

function setAdminHome()
{

    require('view/back/backHome.php');
}
