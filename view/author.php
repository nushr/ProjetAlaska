<?php $title="A propos de l'auteur" ?>

<?php ob_start(); ?>

<h1>A propos de l'auteur</h1>

<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>
