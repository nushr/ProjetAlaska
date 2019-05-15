<?php $title="Le roman" ?>

<?php ob_start(); ?>

<h1>Le nouveau projet de Jean</h1><br>

<div>
    <p>Cher lecteur, attention les yeux.</p><br>
    <p>Après mon dernier roman consacré à comment j'ai décidé de devenir constructeur de véhicules motorisés, je vais maintenant vous faire voyager.</p><br>
    <p>Je vais vous emmener dans le grand nord pour une expédition digne des plus grands expéditeurs.</p><br>
    <p>Accrochez-vous, ça va être du solide !</p><br>
    <p><img alt="signature" src="public/assets/signature.png"></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>
