<!DOCTYPE HTML>

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <title>Billet simple pour l'Alaska : Administration</title>

        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="public/styles/styles.css">

        <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">

    </head>



    <body>

        <header>
            <h1>Billet simple pour l'Alaska</h1>
        </header>

        <div id="else_visuel"><a href="index.php?action=adminLog&name=index"><img src="public/assets/view.png" alt="visuel"></a></div>


        <menu>
            <hr>
            <div>
                <p><a href="index.php?action=adminLog&name=addchapter">Ecrire un nouveau chapitre</a></p>
                <p><a href="index.php?action=adminLog&name=comments">Modérer les commentaires</a></p>
                <p><a href="index.php?action=adminLog&name=chapters">Voir les chapitres publiés</a></p>
                <p><a href="index.php?action=adminLog&name=logout">Se déconnecter</a></p>
            </div>
            <hr>
        </menu>

        <div id="admin_content">
            <?= $admin_content ?>
        </div>


    </body>

</html>
