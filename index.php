<?php

$sess_id = session_id();
if (empty ($sess_id)) session_start();

require('controller/front/homeController.php');
require('controller/front/postController.php');
require('controller/front/templateController.php');
require('controller/back/adminController.php');
require('controller/back/adminTemplateController.php');


try {

    if (isset($_GET['action']))
    {

        if ($_GET['action'] == 'post')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                post();
            }
            else
            {
                // Error message sent to catch
                throw new Exception('Mince ! Aucun chapitre ici !');
            }
        }

        elseif ($_GET['action'] == 'addComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                if (!empty($_POST['author']) && !empty($_POST['message']))
                {
                    addComment($_GET['id'], $_POST['author'], $_POST['message']);
                }
                else
                {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis');
                }
            }
            else
            {
                throw new Exception('Erreur : pas de chapitre correspondant');
            }
        }

        elseif ($_GET['action'] == 'signalComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                signalComment($_GET['id']);
            }
            else
            {
                throw new Exception('Pas de commentaire correspondant');
            }
        }

        elseif ($_GET['action'] == 'page') // other than home or post reading
        {
            if (isset ($_GET['name']))
            {
                templateView($_GET['name']);
            }
            else {
                throw new Exception('Pas de page correspondante');
            }
        }

        // ! back office below
        elseif ($_GET['action'] == 'connexion')
        {
            backConnexion($_POST['id'], $_POST['pwd']);
        }

        elseif ($_GET['action'] == 'adminLog') // towards admin pages
        {
            if (!isset($_SESSION['logged']))
            {
                throw new Exception("Vous n'êtes pas identifié");
            }

            if (isset ($_GET['name']))
            {
                setAdminHome($_GET['name']);
            }
            else {
                throw new Exception('Pas de page correspondante');
            }
        }

        elseif ($_GET['action'] == 'newPost')
        {
            newPost($_POST['new_title'], $_POST['new_chapter_content']);
        }

        elseif ($_GET['action'] == 'deleteChapter')
        {
            deletePost($_GET['name']);
        }

        elseif ($_GET['action'] == 'updatePost')
        {
            updatePost($_POST['modified_title'], $_POST['modified_content'], $_GET['id']);
        }

        elseif ($_GET['action'] == 'allowComment')
        {
            allowComment($_GET['id']);
        }

        elseif ($_GET['action'] == 'deleteComment')
        {
            deleteComment($_GET['id']);
        }

        elseif ($_GET['action'] == 'updateAddress')
        {
            updateAddress($_POST['new_log_address'], $_GET['id']);
        }

        elseif ($_GET['action'] == "updatePwd")
        {
            updatePwd($_POST['old_log_pwd'], $_POST['new_log_pwd'], $_POST['new_log_pwd_confirm'], $_GET['id']);
        }

        else
        {
            throw new Exception('Cette page n\'existe pas');
        }

    }

    else { // Si pas d'action précisée dans l'URL : revient à la page d'accueil avec liste des posts
        listPosts();
    }
}

// En cas de soucis avec ce qui est entré dans l'URL
catch(Exception $e)
{
    $title="Erreur d'aiguillage";
    $content="Erreur : " . $e->getMessage() . "<br>Cliquez pour <a href=\"index.php\">revenir à l'accueil</a>";

    require('view/front/templateView.php');
}
