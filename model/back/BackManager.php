<?php

require_once('model/Manager.php');

class BackManager extends Manager
{

    public function checkId($id)
    {

        $db = $this->dbConnect();

        $req = $db->prepare('SELECT pwd FROM utilisateurs WHERE mail = ?');
        $req->execute(array($id));

        $dbPwd = $req->fetch();

        return $dbPwd;

    }


}
