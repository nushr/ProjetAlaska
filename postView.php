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
                <?php
                if ($post['id']>1)
                {
                    ?><p><a href="index.php?action=post&amp;id=<?= $post['id']-1 ?>">Chapitre précédent</a></p><?php
                }
                else {
                    ?><p class="nav_disabled">Chapitre précédent</p><?php
                }
                ?>
                <p><a href="index.php">Retour à l'accueil</a></p>
                <?php
                if ($post['id']<6)
                {
                    ?><p><a href="index.php?action=post&amp;id=<?= $post['id']+1 ?>">Chapitre suivant</a></p><?php
                }
                else
                {
                    ?><p class="nav_disabled">Chapitre suivant</p><?php
                }
                ?>
            </div>
            <hr>
        </menu>

        <div id="single_post">
            <h3><?= $post['titre'] ?></h3><br>
            <p><?= $post['contenu'] ?></p>
            <br>
            <h3>Commentaires (<?= $nbComments ?>)</h3><br>
            <?php
            while ($comment = $comments->fetch())
            {
                $date_creation_fr = DateTime::createFromFormat('Y-m-d', $comment['date_creation']);
                ?>
                <div>
                    <p><i>" <?= $comment['contenu'] ?> "</i></p>
                    <p>Publié par <b><?= $comment['auteur'] ?></b> le <?= $date_creation_fr->format('d/m/Y') ?></p>
                    <br>
                </div>
                <?php
            }
            ?>

        </div>

    </body>

</html>
