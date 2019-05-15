<?php $title="Contact" ?>

<?php ob_start(); ?>

<h1>Contact</h1><br>

<p>Cher lecteur, j'en suis certain, tu t'es déjà demandé : mais comment diable écrire à Jean Forteroche ?</p><br>
<p>Heureusement pour toi, grâce à l'internet, c'est aujourd'hui très simple :</p><br>

<p><strong>Adresse postale</strong><br>4 chemin des Lentilles<br>48930 BOUM</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>
