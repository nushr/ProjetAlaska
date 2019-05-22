<?php

require_once('model/back/BackManager.php');

function backConnexion($id, $pwd) {

    $backManager = new BackManager();

    $dbPwd = $backManager->checkId($id);

    if ($dbPwd[0] == $pwd)
    {
        require('view/back/backHome.php');
    }
    else {
        echo("FAUX");
    }

}
