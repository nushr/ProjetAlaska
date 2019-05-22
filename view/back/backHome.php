<?php

session_start();

if (!isset($_SESSION['logged']))
{ ?>
    <div>Vous n'êtes pas connecté.</div>
    <div>Merci de vous connecter <a href="index.php?action=page&amp;name=connexion">ici</a></div>
    <?php
}
else
{
    echo "Bienvenue Jean Forteroche. Que voulez-vous faire mon ami ?";
}
