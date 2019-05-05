<!DOCTYPE HTML>

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <title>Billet simple pour l'Alaska : le blog du roman</title>

        <meta name="description" content="Le nouveau roman de Jean Forteroche, en publication exclusive, ici, par épisodes">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="styles/styles.css">

        <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">


    </head>



    <body>

        <header>
            <h1>Billet simple pour l'Alaska</h1>
            <img alt="illustration alaska" src="assets/C3119-02.jpg">
            <h3>Le nouveau roman de Jean Forteroche</h3>
        </header>

        <menu>
            <hr>
            <div>
                <p><a href="#">A propos de l'auteur</a></p>
                <p><a href="#">Le roman</a></p>
                <p><a href="#">Liste des chapitres publiés</a></p>
                <p><a href="#">Contact</a></p>
            </div>
            <hr>
        </menu>

        <?php

        while ($data = $posts->fetch())
        {
            $date_creation_fr = DateTime::createFromFormat('Y-m-d', $data['date_creation']);
            ?>
            <div id="last_posts">
                <h4><?= $data['titre'] ?></h4>
                <p><?= substr($data['contenu'],0,700) ?>... <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Voir plus</a></p>
                <p>
                    <i>Publié le <?= $date_creation_fr->format('d/m/Y') ?> par votre serviteur, <?= $data['auteur'] ?></i>
                    <img id="signature" alt="signature" src="assets/signature.png">
                    <p>0 commentaires</p>
                </p>
            </div>
        <?php
        }

        $posts->closeCursor();

        ?>

    </body>

</html>
