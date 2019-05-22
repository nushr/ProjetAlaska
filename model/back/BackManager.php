<?php

require_once('model/Manager.php');

class BackManager extends Manager
{

    public function checkId($id)
    {

        $db = $this->dbConnect();

        $req = $db->prepare('SELECT pwd FROM utilisateurs WHERE mail = ?');
        $req->execute(array($id));

        $dbPwd = $req->fetch();

        return $dbPwd;

    }

    public function displayBackPage($page)
    {

        if ($page == "index")
        {
            ob_start(); ?>

            <h1>Bienvenue, Jean</h1><br>
            <div>Voulez-vous modifier vos informations personnelles, par hasard ?</div>
            <?php $admin_content = ob_get_clean();

        }

        elseif ($page == "addchapter") {
            ob_start(); ?>

            <h1>Nouveau chapitre</h1><br>
            <div>Vous allez écrire un nouveau chapitre</div>
            <?php $admin_content = ob_get_clean();
        }

        elseif ($page == "comments") {
            ob_start(); ?>

            <h1>Modération des commentaires</h1><br>
            <div>Voici la modération des commentaires</div>
            <?php $admin_content = ob_get_clean();
        }

        elseif ($page == "chapters") {
            ob_start(); ?>

            <h1>Liste des chapitres publiés</h1><br>
            <div>Voici les chapitres publiés</div>
            <?php $admin_content = ob_get_clean();
        }

        else {
            $admin_content = "Pas encore écrit";
        }

        require('view/back/adminView.php');
    }

}

?>
