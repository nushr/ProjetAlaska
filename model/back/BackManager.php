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
            <p><a href="#"><?= $data['titre'] ?></a><a href="#" class="changeLink">Retoucher</a><a href="index.php?action=deleteChapter&name=<?= $data['id'] ?>" class="deleteLink">Supprimer</a></p>

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
            <div>Pour modifier vos informations personnelles, <a href="#">cliquez-ici</a></div>
            <?php $admin_content = ob_get_clean();
        }

        elseif ($page == "addchapter")
        {
            ob_start(); ?>

            <h1>Ajout d'un chapitre</h1><br>

            <div id="new_chapter">
                <form action="index.php?action=newPost" method="post">
                    <label for="new_title">Titre du chapitre :</label>
                    <input type="text" id="new_title" name="new_title"></input><br><br>
                    <textarea id="new_chapter_content" name="new_chapter_content"></textarea><br>
                    <input type="submit" value="Publier"></input>
                    <input type="button" value="Annuler"></input>
                    <input type="button" value="Enregister"></input>
                </form>
            </div>

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

    public function addPost($title, $content)
    {
        $db = $this->dbConnect();

        $dateCrea = date('Y-m-d');

        $post = $db->prepare('INSERT INTO articles(date_creation, titre, contenu, date_maj) VALUES (?, ?, ?, ?)');
        $post->execute(array($dateCrea , $title, $content, $dateCrea));
    }

    public function deletePost($id)
    {
        $db = $this->dbConnect();

        $delete = $db->prepare('DELETE FROM articles WHERE id = ?');
        $deletecomments = $db->prepare('DELETE FROM commentaires WHERE post_id = ?');
        $delete->execute(array($id));
        $deletecomments->execute(array($id));
    }

}

?>
