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

        $dateCrea = date('Y-m-d');

        $comment = $db->prepare('INSERT INTO commentaires(post_id, auteur, date_creation, contenu) VALUES (?, ?, ?, ?)');
        $affectedLines = $comment->execute(array($postId, $author, $dateCrea, $message));

        return $affectedLines;
    }

    public function signalComment($commentId)
    {

        $db = $this->dbConnect();

        $signal = $db->prepare('UPDATE commentaires SET signale = 1 WHERE id = ?');
        $checker = $signal->execute(array($commentId));

        return $checker;
    }


    public function countComments($postId)
    {

        $db = $this->dBConnect();

        $nbComments = $db->prepare('SELECT COUNT(ID) FROM commentaires WHERE post_id = ?');
        $nbComments->execute(array($postId));
        
        $result = $nbComments->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }


}
