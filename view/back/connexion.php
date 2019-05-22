<?php

echo $_POST['pwd'];

$db = new PDO('mysql:host=localhost;dbname=alaska;charset=utf8', 'root', '');
return $db;

$db->dbConnect();

$req = $db->prepare('SELECT pwd FROM users WHERE id = ?');

$req->execute(array($_POST['id']));

$dbPwd = $req->fetch();

$attemptPwd = $_POST['pwd'];



if (isset($_POST['id']) && isset($_POST['pwd']))
{
    if ($attemptPwd == $dbPwd)
    {
        echo "You did it mate !";
    }
    else
    {
        echo "J'en étais sûr, tu n'es pas référencé dans la base";
    }

}

else
{
    echo "Remplis les champs, fourbe !";

}
