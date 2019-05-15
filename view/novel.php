<?php $title="Le roman" ?>

<?php ob_start(); ?>

<h1>Le nouveau projet de Jean</h1>

<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>
