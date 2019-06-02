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

        $req = $db->prepare('SELECT titre,id FROM articles ORDER BY id ASC');

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

    public function getLastPostId()
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id FROM articles ORDER BY id DESC LIMIT 1');

        $req->execute();

        $lastPost = $req->fetch();

        return $lastPost;
    }

    public function getNextPostId($currentId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id FROM articles WHERE id > ? ORDER BY id ASC LIMIT 1');

        $req->execute(array($currentId));

        $nextPost = $req->fetch();

        return $nextPost;
    }

    public function getPrevPostId($currentId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id FROM articles WHERE id < ? ORDER BY id DESC LIMIT 1');

        $req->execute(array($currentId));

        $prevPost = $req->fetch();

        return $prevPost;
    }

}
