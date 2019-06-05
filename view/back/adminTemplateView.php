<!DOCTYPE HTML>

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <title>Billet simple pour l'Alaska : Espace Administration</title>

        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="public/styles/styles.css">
        <link rel="stylesheet" href="public/styles/media.css">

        <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">

        <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=el6dm5d5vqksn4rgbysetwes7gga8yl54utj2n6zl5fk6jby"></script> <!-- Tinymce -->

    </head>

    <body>

        <header>
            <h1>Billet simple pour l'Alaska</h1>
            <h3>Espace administration</h3>
        </header>

        <menu>
            <hr>
            <div>
                <p><a href="index.php?action=adminLog&name=index">Accueil</a></p>
                <p><a href="index.php?action=adminLog&name=addchapter">Ecrire un nouveau chapitre</a></p>
                <p><a href="index.php?action=adminLog&name=comments">Modérer les commentaires</a></p>
                <p><a href="index.php?action=adminLog&name=chapters">Voir les chapitres publiés</a></p>
                <p><a href="index.php?action=adminLog&name=logout" id="logged_link">Se déconnecter</a></p>
            </div>
            <hr>
        </menu>

        <div id="admin_content">
            <?= $admin_content ?>
        </div>

        <script src="public/script/tinymce.js"></script>

    </body>

</html>
