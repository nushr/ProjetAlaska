<?php

require_once('model/back/AdminManager.php');


function backConnexion($id, $pwd)
{
    $adminManager = new AdminManager();

    $dbPwd = $adminManager->checkId($id);

    if ($dbPwd[0] == hash('md5', $pwd))
    {
        $_SESSION['logged'] = true;
        header("Location: index.php?action=adminLog&name=index");
    }

    else
    {
        throw new Exception('Vos identifiants de session sont incorrects.<br>Pour un nouvel essai, <a href="index.php?action=page&name=connexion">cliquer ici</a><br>');
    }
}

// allowed when logged in functions
function newPost($title, $content)
{
    $adminManager = new AdminManager();

    $adminManager->addPost($title, $content);

    header("Location: index.php?action=adminLog&name=chapters");
}

function updatePost($title, $content, $id)
{
    $adminManager = new AdminManager();

    $adminManager->updatePostContent($title, $content, $id);

    header("Location: index.php?action=adminLog&name=chapters");
}

function deletePost($id)
{
    $adminManager = new AdminManager();

    $adminManager->deletePost($id);

    header("Location: index.php?action=adminLog&name=chapters");
}

function allowComment($id)
{
    $adminManager = new AdminManager();

    $adminManager->allowComment($id);

    header("Location: index.php?action=adminLog&name=comments");
}

function deleteComment($id)
{
    $adminManager = new AdminManager();

    $adminManager->deleteComment($id);

    header("Location: index.php?action=adminLog&name=comments");
}

function updateAddress($newAddress, $id)
{
    $adminManager = new AdminManager();

    $adminManager->changeDbAddress($newAddress, $id);

    header("Location: index.php?action=adminLog&name=infos");
}

function updatePwd($oldPwd, $newPwd, $newPwdConfirm, $id)
{
    $adminManager = new AdminManager();

    $old = $adminManager->checkPwd($id);

    if ($old[0] == hash('md5', $oldPwd))
    {
        if ($newPwd != $newPwdConfirm)
        {
            throw new Exception('Merci de rentrer deux fois le même mot de passe<br><a href="index.php?action=adminLog&name=pwd">Ré-essayer</a><br>');
        }
        else
        {
            $hashedPwd = hash('md5', $newPwd);
            $new = $adminManager->updatePwd($hashedPwd, $id);
            header("Location: index.php?action=adminLog&name=infos");
        }
    }
    else
    {
        throw new Exception('Vous n\'avez pas renseigné le bon ancien mot de passe<br><a href="index.php?action=adminLog&name=pwd">Ré-essayer</a><br>');
    }
}

// when password lost : creates new one + updates db. Sends mail to user via index
function generateTempPwd($mailtoAdress)
{
    $randomInt = rand(1000000, 999999999);
    $tempPwd = hash('md5', $randomInt);

    $adminManager = new AdminManager();
    $adminManager->updateTempPwd($tempPwd, $mailtoAdress);

    return $randomInt;
}
