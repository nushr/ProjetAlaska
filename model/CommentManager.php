<?php

require_once('model/Manager.php');

class CommentManager extends Manager
{

    public function getComments($postId)
    {

        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id,post_id,auteur,date_creation,contenu FROM commentaires WHERE post_id = ? ORDER BY id ASC');
        $comments->execute(array($postId));

        return $comments;
    }


    public function postComment($postId, $author, $message)
    {

        $db = $this->dbConnect();

        $comment = $db->prepare('INSERT INTO commentaires(post_id, auteur, date_creation, contenu, ) VALUES ?, ?, ?, ?');
        $affectedLines = $comment->execute(array($postId, $author, CURRENT_DATE(), $message));

        return $affectedLines;
    }

    public function signalComment($commentId)
    {

        $db = $this->dbConnect();

        $signal = $db->exec('UPDATE commentaires SET signale = 1 WHERE id = ?');

        return $signal;
    }


    public function countComments($postId)
    {

        $db = $this->dBConnect();

        $nbComments = $db->query('SELECT COUNT(id) FROM commentaires WHERE post_id = ?');

        return $nbComments;
    }


}
