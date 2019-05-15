<!DOCTYPE HTML>

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <title>Billet simple pour l'Alaska : <?= $title ?></title>

        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="public/styles/styles.css">

        <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">

    </head>

    <body>

        <header>
            <h1>Billet simple pour l'Alaska</h1>
        </header>

        <div id="else_visuel"><a href="index.php"><img src="public/assets/view.png" alt="visuel"></a></div>

        <menu>
            <hr>
            <div>
                <p><a href="index.php?action=page&amp;name=author">A propos de l'auteur</a></p>
                <p><a href="index.php?action=page&amp;name=novel">Le roman</a></p>
                <p><a href="index.php?action=page&amp;name=chapters">Liste des chapitres publiés</a></p>
                <p><a href="index.php?action=page&amp;name=contact">Contact</a></p>
            </div>
            <hr>
        </menu>

        <div id="page_content">
            <?= $content ?>
        </div>

    </body>

</html>