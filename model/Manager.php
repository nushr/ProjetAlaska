<?php

class Manager
{

    protected function dbConnect()
    {

        $host_name = 'db5000099047.hosting-data.io';
        $database = 'dbs93587';
        $user_name = 'dbu103728';
        $password = 'aBc99!?++kL';
        $db = null;

        try
        {
            $db = new PDO("mysql:host=$host_name; dbname=$database", $user_name, $password);
            return $db;
        }
        catch (PDOException $e)
        {
            echo "Erreur!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}
