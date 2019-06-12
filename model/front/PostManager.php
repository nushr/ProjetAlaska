<?php

require_once('model/Manager.php');


class PostManager extends Manager
{

    public function getPosts() // retrieves 3 last posts for homepage excerpts
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT date_creation,titre,contenu,auteur,id FROM articles ORDER BY id DESC LIMIT 3');

        $req->execute();

        return $req;
    }

    public function getPost($postId) // gets 1 post from id for reading mode
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT date_creation,titre,contenu,auteur,id FROM articles WHERE id = ?');

        $req->execute(array($postId));

        $post = $req->fetch();

        return $post;
    }

    public function listChapters() // for chapters page
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT titre,id FROM articles ORDER BY id ASC');

        $req->execute();

        return $req;
    }

    public function countPosts() // for accurate navigation in reading post pages (1/4)
    {
        $db = $this->dbConnect();

        $nbPosts = $db->prepare('SELECT COUNT(ID) FROM articles');
        $nbPosts->execute();

        $result = $nbPosts->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getLastPostId() // for accurate navigation in reading post pages (2/4)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id FROM articles ORDER BY id DESC LIMIT 1');

        $req->execute();

        $lastPost = $req->fetch();

        return $lastPost;
    }

    public function getNextPostId($currentId) // for accurate navigation in reading post pages (3/4)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id FROM articles WHERE id > ? ORDER BY id ASC LIMIT 1');

        $req->execute(array($currentId));

        $nextPost = $req->fetch();

        return $nextPost;
    }

    public function getPrevPostId($currentId) // for accurate navigation in reading post pages (4/4)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id FROM articles WHERE id < ? ORDER BY id DESC LIMIT 1');

        $req->execute(array($currentId));

        $prevPost = $req->fetch();

        return $prevPost;
    }

}
