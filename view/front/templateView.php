<!DOCTYPE HTML>
<!-- For all front pages other than homepage & single post display -->
<!-- Note : Template. Variables : $title + $content -->

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <title>Billet simple pour l'Alaska : <?= $title ?></title>

        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="public/styles/styles.css">
        <link rel="stylesheet" href="public/styles/media.css">

        <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">

    </head>

    <body>

        <header>
            <h1>Billet simple pour l'Alaska</h1>
        </header>

        <div id="else_visuel"><a href="index.php"><img src="public/assets/view.png" alt="visuel"></a></div>

        <div id="menu">
            <hr>
            <menu>
                <p><a href="index.php">Accueil</a></p>
                <p><a href="index.php?action=page&amp;name=author">A propos de l'auteur</a></p>
                <p><a href="index.php?action=page&amp;name=novel">Le roman</a></p>
                <p><a href="index.php?action=page&amp;name=chapters">Liste des chapitres publiés</a></p>
                <p><a href="index.php?action=page&amp;name=contact">Contact</a></p>
            </menu>
            <hr>
        </div>

        <div id="page_content">
            <?= $content ?>
        </div>

        <footer>
            <hr>
            <div>
                <p><a href="index.php?action=page&amp;name=mentions">Mentions légales</a></p>
                <p>&copy; Jean Forteroche 2019</p>
                <?php
                if (!isset($_SESSION['logged']))
                {
                    ?><p><a href="index.php?action=page&amp;name=connexion">Connexion</a></p><?php
                }
                else
                {
                    ?><p><a href="index.php?action=adminLog&amp;name=index" id="logged_link">Espace administration</a></p><?php
                }
                ?>
            </div>
        </footer>

    </body>

</html>
