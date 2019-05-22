<?php

require('controller/front/controller.php');


try {

    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'listPosts')
        {
            listPosts();
        }
        elseif ($_GET['action'] == 'post')
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
                throw new Exception('Erreur : pas de commentaire correspondant');
            }
        }
        elseif ($_GET['action'] == 'page')
        {
            elseView($_GET['name']);
        }
    }

    else {
        listPosts();
    }
}

catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}
