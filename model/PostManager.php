<?php

require_once('model/Manager.php');

class PostManager extends Manager
{

    public function getPosts()
    {

        $db = $this->dbConnect();

        $req = $db->prepare('SELECT date_creation,titre,contenu,auteur,id FROM articles ORDER BY id DESC LIMIT 3');

        $req->execute();

        return $req;

    }


    public function getPost($postId)
    {

        $db = $this->dbConnect();

        $req = $db->prepare('SELECT date_creation,titre,contenu,auteur,id FROM articles WHERE id = ?');

        $req->execute(array($postId));

        $post = $req->fetch();

        return $post;

    }

}


// Again : no closing tag
