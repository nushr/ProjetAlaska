<?php

require_once('model/back/AdminManager.php');


function setAdminHome($page)
{ // switch for admin pages content from URL "page" parameter
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

        ob_start();
            require('view/back/pages/chapters.php'); ?>
        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "index")
    {
        $adminManager = new AdminManager();

        $signaledNb = $adminManager->countSignaledComments();

        ob_start();
            require('view/back/pages/index.php'); ?>
        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "addchapter")
    {
        ob_start();
            require('view/back/pages/addChapter.html'); ?>
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

        ob_start();
            require('view/back/pages/updateChapter.php'); ?>
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
            ob_start();
                require('view/back/pages/comments.php'); ?>
            <?php $admin_content = ob_get_clean();
        }

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "chapter")
    {
        $adminManager = new AdminManager();

        $chapter = $adminManager->seeChapter($_GET['id']);

        ob_start();
            require('view/back/pages/chapter.php'); ?>
        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "deleteconfirm")
    {
        ob_start();
            require('view/back/pages/deleteConfirm.php'); ?>
        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "infos")
    {
        $adminManager = new AdminManager();

        $logAddress = $adminManager->getLogAddress(1);

        ob_start();
            require('view/back/pages/infos.php'); ?>
        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "address")
    {
        ob_start();
            require('view/back/pages/address.html'); ?>
        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    elseif ($page == "pwd")
    {
        ob_start();
            require('view/back/pages/pwd.html'); ?>
        <?php $admin_content = ob_get_clean();

        require('view/back/adminTemplateView.php');
    }

    else
    {
        $admin_content = "Cette page n'existe pas";
    }
}
