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
            <p>
                <a href="index.php?action=adminLog&name=chapter&id=<?= $data['id'] ?>"><?= $data['titre'] ?></a>
                <a href="index.php?action=adminLog&name=updatechapter&id=<?= $data['id'] ?>" class="changeLink">Retoucher</a>
                <a href="index.php?action=adminLog&name=deleteconfirm&id=<?= $data['id'] ?>" class="delete_link">Supprimer</a>
            </p>
            <?php
        }

        $chapters->closeCursor();
        ?>

        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "index")
    {
        $adminManager = new AdminManager();

        $signaledNb = $adminManager->countSignaledComments();

        ob_start(); ?>

        <h1>Bienvenue, Jean</h1><br>
        <div>Pour modifier vos informations personnelles, <a href="index.php?action=adminLog&name=infos">cliquez-ici</a> !</div><br>
        <?php
        if ($signaledNb['COUNT(ID)'] == 0)
        { ?>
            <div>Vous n'avez pas commentaires en attente de modération. <a href="index.php?action=adminLog&name=comments">Bravo !</a></div><br>
        <?php }
        else
        { ?>
            <div>Vous avez <?= $signaledNb['COUNT(ID)'] ?> commentaires en attente de modération. <a href="index.php?action=adminLog&name=comments">Voir</a></div><br>
        <?php }
        ?>
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
        $adminManager = new AdminManager();

        $comments = $adminManager->listOutrageousComments();

        $signaledNb = $adminManager->countSignaledComments();

        if ($signaledNb['COUNT(ID)'] == 0)
        {
            ob_start(); ?>
            <h1>Modération des commentaires</h1><br>
            <div>Vous n'avez pas de commentaires actuellement signalés comme outrageants. C'est la fête !</div>
            <?php $admin_content = ob_get_clean();
        }
        else
        {
            ob_start(); ?>
            <h1>Modération des commentaires</h1><br>
            <div>Voici les commentaires actuellement signalés comme outrageants :</div><br>

            <?php while($data = $comments->fetch())
            {
            $commentDate = DateTime::createFromFormat('Y-m-d', $data['date_creation']);
            $commentChapter = $adminManager->getChapterNb($data['post_id']);
            ?>

                <p>" <?= $data['contenu'] ?> "</p>
                <p>Publié par <b><?= $data['auteur'] ?></b>, le <?= $commentDate->format('d/m/Y') ?>, à propos du <a href="index.php?action=adminLog&name=chapter&id=<?= $data['post_id'] ?>"><?= $commentChapter['titre'] ?></p>
                <p>
                    <span><a href="index.php?action=allowComment&id=<?= $data['id'] ?>" class="allow_comment_link">Autoriser le commentaire</a></span>
                    <span><a href="index.php?action=deleteComment&id=<?= $data['id'] ?>" class="delete_comment_link">Supprimer le commentaire</a></span>
                </p><br>

            <?php }
            $comments->closeCursor()
            ?>
            <?php $admin_content = ob_get_clean();
        }

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "chapter")
    {
        $adminManager = new AdminManager();

        $chapter = $adminManager->seeChapter($_GET['id']);

        ob_start(); ?>

        <h1><?= $chapter['titre'] ?></h1><br>
        <div><?= $chapter['contenu'] ?></div><br>
        <p>
            <a href="index.php?action=adminLog&name=chapters">Retour à la liste des articles</a>
            <a href="index.php?action=adminLog&name=updatechapter&id=<?= $chapter['id'] ?>" class="changeLink">Retoucher</a>
            <a href="index.php?action=adminLog&name=deleteconfirm&id=<?= $chapter['id'] ?>" class="delete_link">Supprimer</a>
        </p>

        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "deleteconfirm")
    {
        ob_start(); ?>

        <p>Etes-vous sûr de vouloir supprimer ce chapitre, ainsi que tous les commentaires qui y sont liés ?</p>
        <p>Cette action est <u>irréversible</u>.</p><br>
        <p>
            <a href="index.php?action=deleteChapter&name=<?= $_GET['id'] ?>">Oui</a>
            <span>&emsp;</span>
            <a href="index.php?action=adminLog&name=chapters">Non</a>
        </p>

        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "infos")
    {
        $adminManager = new AdminManager();

        $logAddress = $adminManager->getLogAddress(1);

        ob_start(); ?>

        <h1>Modification des données du compte</h1><br>

        <div>
            <p>Votre adresse de connexion est la suivante : <u><?= $logAddress['mail'] ?></u></p>
            <p><a href="index.php?action=adminLog&name=address" id="change_address_link">Modifier</a></p><br>
            <p>Pour changer votre mot de passe, c'est par ici :</p>
            <p><a href="index.php?action=adminLog&name=pwd">Changement du mot de passe</a></p>
        </div>

        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "address")
    {
        ob_start(); ?>

        <h1>Modification des données du compte</h1><br>

        <div>
            <form method="post" action="index.php?action=updateAddress&id=1" id="change_address_form">
                <label for="new_log_address">Nouvelle adresse :</label><br>
                <input type="text" name="new_log_address" id="new_log_address"></input><br><br>
                <input type="submit" value="Enregistrer" id="new_mail_submit">
                <a href="index.php?action=adminLog&name=infos">Annuler</a>
            </form>
        </div>

        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "pwd")
    {
        ob_start(); ?>

        <h1>Modification des données du compte</h1><br>

        <div>
            <form method="post" action="index.php?action=updatePwd&id=1" id="change_pwd_form">
                <label for="old_log_pwd">Ancien mot de passe :</label><br>
                <input type="password" name="old_log_pwd" id="old_log_pwd" required></input><br><br>
                <label for="new_log_pwd">Nouveau mot de passe :</label><br>
                <input type="password" name="new_log_pwd" id="new_log_pwd" required></input><br><br>
                <label for="new_log_pwd_confirm">Nouveau mot de passe (confirmation) :</label><br>
                <input type="password" name="new_log_pwd_confirm" id="new_log_pwd_confirm" required></input><br><br>
                <input type="submit" value="Enregistrer" id="new_pwd_submit">
                <a href="index.php?action=adminLog&name=infos">Annuler</a>
            </form>
        </div>

        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    else
    {
        $admin_content = "Cette page n'existe pas";
    }
}
