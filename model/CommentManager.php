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

        $comment = $db->prepare('INSERT INTO commentaires(post_id, auteur, date_creation, contenu) VALUES ?, ?, CURRENT_DATE(), ?');
        $affectedLines = $comment->execute(array($postId, $author, $message));

        return $affectedLines;
    }


    public function countComments($postId)
    {

        $db = $this->dBConnect();

        $nbComments = $db->query('SELECT COUNT(id) FROM commentaires WHERE post_id = ?');

        return $nbComments;
    }


}
