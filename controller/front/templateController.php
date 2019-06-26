<?php

require_once('model/front/PostManager.php');
require_once('model/front/CommentManager.php');


function chaptersList() // for homepage excerpts
{
    $postManager = new PostManager();

    $posts = $postManager->listChapters();
}

function templateView($page)
{ // static pages contents and titles here cf. template

    if ($page == "chapters")
    {
        $postManager = new PostManager();
        $posts = $postManager->listChapters();

        $title="Billet simple pour l'Alaska : les chapitres" ?>

        <?php ob_start();
            require('view/front/pages/chapters.php'); ?>
        <?php $content = ob_get_clean();

        require('view/front/templateView.php');
    }

    else
    {
        if ($page == "author")
        {
            $title="Billet simple pour l'Alaska : à propos de l'auteur"; ?>

            <?php ob_start();
                require('view/front/pages/author.html'); ?>
            <?php $content = ob_get_clean();
        }

        elseif ($page == "contact")
        {
            $title="Billet simple pour l'Alaska : contact" ?>

            <?php ob_start();
                require('view/front/pages/contact.html'); ?>
            <?php $content = ob_get_clean();
        }

        elseif ($page == "novel")
        {
            $title="Billet simple pour l'Alaska : le roman" ?>

            <?php ob_start();
                require('view/front/pages/novel.html'); ?>
            <?php $content = ob_get_clean();
        }

        elseif ($page == "ours")
        {
            $title="Billet simple pour l'Alaska : photo exclusive"; ?>

            <?php ob_start(); ?>
                <div id="bear_bloc"><a href="index.php"><img id="bear_pic" alt="Ours polaire" src="public/assets/ours.jpg"></a></div>
            <?php $content = ob_get_clean();
        }

        elseif ($page == "recipe")
        {
            $title="Billet simple pour l'Alaska : recette de la Bombe Alaska"; ?>

            <?php ob_start();
                require('view/front/pages/recipe.html'); ?>
            <?php $content = ob_get_clean();
        }

        elseif ($page == "mentions")
        {
            $title="Billet simple pour l'Alaska : mentions légales & crédits"; ?>

            <?php ob_start();
                require('view/front/pages/mentions.html'); ?>
            <?php $content = ob_get_clean();
        }

        elseif ($page == "connexion")
        {
            $title="Billet simple pour l'Alaska : connexion"; ?>

            <?php ob_start();
                require('view/front/pages/connexion.html'); ?>
            <?php $content = ob_get_clean();
        }

        elseif ($page == "newPassword")
        {
            $title="Billet simple pour l'Alaska : demande d\'un nouveau mot de passe"; ?>

            <?php ob_start();
                require('view/front/pages/newPassword.html'); ?>
            <?php $content = ob_get_clean();
        }

        else
        {
            throw new Exception('This page has not been written by Jean Forteroche yet');
        }

        require('view/front/templateView.php');
    }

}
