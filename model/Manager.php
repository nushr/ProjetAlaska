<?php

class Manager
{

    protected function dbConnect()
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
