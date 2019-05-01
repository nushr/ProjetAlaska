<!DOCTYPE HTML>

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <title>Billet simple pour l'Alaska : le blog</title>

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
                <p>Aller au premier chapitre</p>
                <p>Voir la liste des chapitres</p>
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
                <p><?= substr($data['contenu'],0,700) ?>... <a href="post.php?id=<?= $data['id'] ?>">Voir plus</a></p>
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
