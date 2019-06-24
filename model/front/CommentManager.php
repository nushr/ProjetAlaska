<?php

require_once('model/Manager.php');


class CommentManager extends Manager
{

    public function getComments($postId) // for single post pages
    {
        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id, post_id, auteur, date_creation, contenu, signale FROM commentaires WHERE post_id = ? ORDER BY id DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getLastComment() // for home page
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT auteur,date_creation,contenu FROM commentaires WHERE signale = 0 ORDER BY id DESC LIMIT 1');
        $req->execute();

        $lastComment = $req->fetch();

        return $lastComment;
    }


    public function postComment($postId, $author, $message)
    {
        $db = $this->dbConnect();

        $dateCrea = date('Y-m-d');

        $htmlMessage = htmlspecialchars($message);

        $comment = $db->prepare('INSERT INTO commentaires(post_id, auteur, date_creation, contenu) VALUES (?, ?, ?, ?)');
        $affectedLines = $comment->execute(array($postId, $author, $dateCrea, $htmlMessage));

        return $affectedLines;
    }

    public function signalComment($commentId)
    {
        $db = $this->dbConnect();

        $signal = $db->prepare('UPDATE commentaires SET signale = 1 WHERE id = ?');
        $checker = $signal->execute(array($commentId));

        return $checker;
    }

    public function countComments($postId) // for hint on post reading pages
    {
        $db = $this->dBConnect();

        $nbComments = $db->prepare('SELECT COUNT(ID) FROM commentaires WHERE post_id = ?');
        $nbComments->execute(array($postId));

        $result = $nbComments->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

}
