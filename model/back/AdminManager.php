<?php

require_once('model/Manager.php');


class AdminManager extends Manager
{

    // !! For back office below

    public function checkId($id) // when connecting
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

    public function listOutrageousComments() // retrieves list of signaled comments
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id, contenu, auteur, date_creation, post_id FROM commentaires WHERE signale = 1 ORDER BY id DESC');
        $comments->execute();

        return $comments;
    }

    public function getChapterNb($id) // gives post title from id
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT titre FROM articles WHERE id = ?');
        $req->execute(array($id));

        $chapterNb = $req->fetch();

        return $chapterNb;
    }

    public function allowComment($id) // removes signalled bool
    {
        $db = $this->dbConnect();

        $allowed = $db->prepare('UPDATE commentaires SET signale = 0 WHERE id = ?');
        $allowed->execute(array($id));
    }

    public function deleteComment($id)
    {
        $db = $this->dbConnect();

        $hidden = $db->prepare('DELETE FROM commentaires WHERE id = ?');
        $hidden->execute(array($id));
    }

    public function countSignaledComments() // for admin homepage
    {
        $db = $this->dbConnect();

        $nbComments = $db->prepare('SELECT COUNT(ID) FROM commentaires WHERE signale = 1');
        $nbComments->execute();

        $result = $nbComments->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getLogAddress($id) // displays current registered address for user
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT mail FROM utilisateurs WHERE id = ?');
        $req->execute(array($id));

        $address = $req->fetch();

        return $address;
    }

    public function changeDbAddress($address, $id) // changes mail id for user
    {
        $db = $this->dbConnect();

        $newAddress = $db->prepare('UPDATE utilisateurs SET mail = ? WHERE id = ?');
        $newAddress->execute(array($address, $id));
    }

    public function checkPwd($id) // checks old password for changing
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT pwd FROM utilisateurs WHERE id = ?');
        $req->execute(array($id));

        $dbPwd = $req->fetch();

        return $dbPwd;
    }

    public function updatePwd($hashedPwd, $id) // updates password in db
    {
        $db = $this->dbConnect();

        $newPassword = $db->prepare('UPDATE utilisateurs SET pwd = ? WHERE id = ?');
        $newPassword->execute(array($hashedPwd, $id));
    }

    public function getForterocheMail() // for sending users messages sent from contact form
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT mail FROM utilisateurs WHERE id = 1');
        $req->execute();

        $forterocheMail = $req->fetch();

        return $forterocheMail;
    }

    public function updateTempPwd($tempPwd, $mailtoAdress) // update db with new temp password when former one said lost
    {
        $db = $this->dbConnect();

        $tempPassword = $db->prepare('UPDATE utilisateurs SET pwd = ? WHERE mail = ?');
        $mailChecker = $tempPassword->execute(array($tempPwd, $mailtoAdress));
    }

}
