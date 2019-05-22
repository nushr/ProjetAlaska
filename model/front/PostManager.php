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

    public function listChapters()
    {

        $db = $this->dbConnect();

        $req = $db->prepare('SELECT titre,id FROM articles');

        $req->execute();

        return $req;
    }

    public function countPosts()
    {

        $db = $this->dbConnect();

        $nbPosts = $db->prepare('SELECT COUNT(ID) FROM articles');
        $nbPosts->execute();

        $result = $nbPosts->fetch(\PDO::FETCH_ASSOC);
        return $result;

    }


}


// Again : no closing tag
