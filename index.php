<?php

require('controller/controller.php');


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
                    postComment($_GET['id'], $_POST['author'], $_POST['message']);
                }
                else
                {
                    echo 'Erreur : tous les champs ne sont pas remplis';
                }
            }
            else {
                echo 'Erreur : pas de chapitre correspondant';
            }
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
