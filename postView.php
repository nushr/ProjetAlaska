<!DOCTYPE HTML>

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <title>Billet simple pour l'Alaska : un chapitre</title>

        <meta name="description" content="Un chapitre du nouveau roman de Jean Forteroche">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="styles/styles.css">

        <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">


    </head>



    <body>

        <header>
            <h1>Billet simple pour l'Alaska</h1>
        </header>

        <menu>
            <hr>
            <div>
                <p>Chapitre précédent</p>
                <p>Chapitre suivant</p>
            </div>
            <hr>
        </menu>

        <div><a href="index.php">Retour à l'accueil du site</a></div>

        <div>
            <h3><?= $post['titre'] ?></h3>
            <p><?= $post['contenu'] ?></p>
        </div>

    </body>

</html>
