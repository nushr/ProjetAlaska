<?php $title="Les chapitres" ?>

<?php ob_start(); ?>

<h1>Liste des chapitres publiés</h1><br>

<?php

while ($data = $posts->fetch())
{
    ?>
    <p><a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= $data['titre'] ?></a></p>

    <?php
}

$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>
