<h1>Bienvenue, Jean</h1><br>
<div>Pour modifier vos informations personnelles, <a href="index.php?action=adminLog&name=infos">cliquez-ici</a> !</div><br>
<?php
if ($signaledNb['COUNT(ID)'] == 0)
{ ?>
    <div>Vous n'avez pas commentaires en attente de modération. <a href="index.php?action=adminLog&name=comments">Bravo !</a></div><br>
<?php }
else
{ ?>
    <div>Vous avez <?= $signaledNb['COUNT(ID)'] ?> commentaires en attente de modération. <a href="index.php?action=adminLog&name=comments">Voir</a></div><br>
<?php }
?>
<div>Pour aller sur votre site, c'est par là : <a href="index.php">Accueil du site</a><div>
