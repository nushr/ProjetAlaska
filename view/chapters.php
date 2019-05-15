<?php $title="Les chapitres" ?>

<?php ob_start(); ?>

<h1>Liste des chapitres publiés</h1>

<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>
