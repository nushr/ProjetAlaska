<?php

class PostManager
{

    public function getPosts()
    {

        $db = $this->dbConnect();

        $req = $db->query('SELECT date_creation,titre,contenu,auteur,id FROM articles ORDER BY id DESC');

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


    private function dbConnect()
    {

        try
        {
            $db = new PDO('mysql:host=localhost;dbname=alaska;charset=utf8', 'root', '');
            return $db;
        }

        catch (\Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

    }

}


// Again : no closing tag
