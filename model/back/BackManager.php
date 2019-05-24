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

    public function listChapters()
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT titre,id FROM articles');

        $req->execute();

        ob_start(); ?>

        <h1>Liste des chapitres publiés</h1><br>

        <?php

        while ($data = $req->fetch())
        {
            ?>
            <p><a href="#"><?= $data['titre'] ?></a><a href="#" class="changeLink">Retoucher</a><a href="#" class="deleteLink">Supprimer</a></p>

            <?php
        }

        $req->closeCursor();
        ?>

        <?php $admin_content = ob_get_clean();

        require('view/back/adminView.php');
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

        elseif ($page == "addchapter")
        {
            ob_start(); ?>

            <h1>Nouveau chapitre</h1><br>
            <div>Vous allez écrire un nouveau chapitre</div>
            <?php $admin_content = ob_get_clean();
        }

        elseif ($page == "comments")
        {
            ob_start(); ?>

            <h1>Modération des commentaires</h1><br>
            <div>Voici la modération des commentaires</div>
            <?php $admin_content = ob_get_clean();
        }


        else
        {
            $admin_content = "Cette page n'existe pas";
        }

        require('view/back/adminView.php');
    }

}

?>
