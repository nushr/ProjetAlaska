<?php

require_once('model/back/AdminManager.php');


function setAdminHome($page)
{
    if ($page == "logout")
    {
        session_unset();
        session_destroy();
        header('Location:index.php');
    }

    elseif ($page == "chapters")
    {
        $adminManager = new AdminManager();

        $chapters = $adminManager->listChapters();

        ob_start(); ?>

        <h1>Liste des chapitres publiés</h1><br>

        <?php

        while ($data = $chapters->fetch())
        {
            ?>
            <p><a href="index.php?action=adminLog&name=chapter&id=<?= $data['id'] ?>"><?= $data['titre'] ?></a><a href="index.php?action=adminLog&name=updatechapter&id=<?= $data['id'] ?>" class="changeLink">Retoucher</a><a href="index.php?action=deleteChapter&name=<?= $data['id'] ?>" class="deleteLink">Supprimer</a></p>

            <?php
        }

        $chapters->closeCursor();
        ?>

        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "index")
    {
        ob_start(); ?>

        <h1>Bienvenue, Jean</h1><br>
        <div>Pour modifier vos informations personnelles, <a href="#">cliquez-ici</a></div><br>
        <div>Pour aller sur votre site, c'est par là : <a href="index.php">Accueil du site</a><div>
        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
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
                <input type="submit" value="Publier" id="new_chapter_submit"></input>
                <a href="index.php?action=adminLog&name=index">Annuler</a>
            </form>
        </div>

        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "updatechapter")
    {
        $adminManager = new AdminManager();

        $chapter = $adminManager->seeChapter($_GET['id']);

        $currentTitle = $chapter['titre'];
        $currentContent = $chapter['contenu'];
        $currentId = $chapter['id'];

        ob_start(); ?>

        <h1>Modification d'un chapitre</h1><br>

        <div id="update_chapter">
            <form action="index.php?action=updatePost&id=<?= $currentId ?>" method="post">
                <label for="modified_title">Titre du chapitre :</label>
                <input type="text" id="modified_title" name="modified_title" value="<?= $currentTitle ?>"></input><br><br>
                <textarea id="modified_content" name="modified_content"><?= $currentContent ?></textarea><br>
                <input type="submit" value="Enregistrer les modifications" id="modified_chapter_submit"></input>
                <a href="index.php?action=adminLog&name=chapters">Annuler</a>
            </form>
        </div>

        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "comments")
    {
        ob_start(); ?>

        <h1>Modération des commentaires</h1><br>
        <div>Voici la modération des commentaires</div>
        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "chapter")
    {
        $adminManager = new AdminManager();

        $chapter = $adminManager->seeChapter($_GET['id']);

        ob_start(); ?>

        <h1><?= $chapter['titre'] ?></h1><br>
        <div><?= $chapter['contenu'] ?></div><br>
        <p><a href="index.php?action=adminLog&name=chapters">Retour à la liste des articles</a><a href="index.php?action=adminLog&name=updatechapter&id=<?= $chapter['id'] ?>" class="changeLink">Retoucher</a><a href="index.php?action=deleteChapter&name=<?= $chapter['id'] ?>" class="deleteLink">Supprimer</a></p>
        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    else
    {
        $admin_content = "Cette page n'existe pas";
    }
}
