<?php

require_once('model/Manager.php');

class AdminManager extends Manager
{

    public function checkId($id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT pwd FROM utilisateurs WHERE mail = ?');
        $req->execute(array($id));

        $dbPwd = $req->fetch();

        return $dbPwd;
    }

    public function listChapters()
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT titre,id FROM articles ORDER BY id ASC');
        $req->execute();

        return $req;
    }

    public function seeChapter($id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT titre, contenu, id FROM articles WHERE id = ?');
        $req->execute(array($id));

        $chapter = $req->fetch();

        return $chapter;
    }

    public function addPost($title, $content)
    {
        $db = $this->dbConnect();

        $dateCrea = date('Y-m-d');

        $post = $db->prepare('INSERT INTO articles(date_creation, titre, contenu, date_maj) VALUES (?, ?, ?, ?)');
        $post->execute(array($dateCrea , $title, $content, $dateCrea));
    }

    public function updatePostContent($title, $content, $id)
    {
        $db = $this->dbConnect();

        $dateUpdate = date('Y-m-d');

        $changedPost = $db->prepare('UPDATE articles SET titre = ?, contenu = ?, date_maj = ? WHERE id = ?');
        $bool = $changedPost->execute(array($title, $content, $dateUpdate, $id));
    }

    public function deletePost($id)
    {
        $db = $this->dbConnect();

        $delete = $db->prepare('DELETE FROM articles WHERE id = ?');
        $deletecomments = $db->prepare('DELETE FROM commentaires WHERE post_id = ?');
        $delete->execute(array($id));
        $deletecomments->execute(array($id));
    }

}
