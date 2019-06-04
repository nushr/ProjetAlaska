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
        $changedPost->execute(array($title, $content, $dateUpdate, $id));
    }

    public function deletePost($id)
    {
        $db = $this->dbConnect();

        $delete = $db->prepare('DELETE FROM articles WHERE id = ?');
        $deletecomments = $db->prepare('DELETE FROM commentaires WHERE post_id = ?');
        $delete->execute(array($id));
        $deletecomments->execute(array($id));
    }

    public function listOutrageousComments()
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id, contenu, auteur, date_creation FROM commentaires WHERE signale = 1 AND visible = 1 ORDER BY id DESC');
        $comments->execute();

        return $comments;
    }

    public function allowComment($id)
    {
        $db = $this->dbConnect();

        $allowed = $db->prepare('UPDATE commentaires SET signale = 0 WHERE id = ?');
        $allowed->execute(array($id));
    }

    public function hideComment($id)
    {
        $db = $this->dbConnect();

        $hidden = $db->prepare('UPDATE commentaires SET visible = 0 WHERE id = ?');
        $hidden->execute(array($id));
    }

    public function countSignaledComments()
    {
        $db = $this->dbConnect();

        $nbComments = $db->prepare('SELECT COUNT(ID) FROM commentaires WHERE signale = 1 AND visible = 1');
        $nbComments->execute();

        $result = $nbComments->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

}
