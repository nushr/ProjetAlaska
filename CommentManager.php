<?php

class CommentManager
{

    public function getComments($postId)
    {

        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id,post_id,auteur,date_creation,contenu FROM commentaires WHERE post_id = ? ORDER BY id ASC');
        $comments->execute(array($postId));

        return $comments;
    }


    public function countComments($postId)
    {

        $db = $this->dBConnect();

        $nbComments = $db->query('SELECT COUNT(id) FROM commentaires WHERE post_id = ?');

        return $nbComments;
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
