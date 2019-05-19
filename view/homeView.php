<!DOCTYPE HTML>

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <title>Billet simple pour l'Alaska : le blog du roman</title>

        <meta name="description" content="Le nouveau roman de Jean Forteroche, en publication exclusive, ici, par épisodes">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="public/styles/styles.css">

        <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">


    </head>



    <body>

        <header>
            <h1>Billet simple pour l'Alaska</h1>
            <img alt="illustration alaska" src="public/assets/C3119-02.jpg">
            <h3>Le nouveau roman de Jean Forteroche</h3>
        </header>

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


        <div id="home_widgets">
            <div id="last_comment">
                <?php $lastComment = lastComment() ?>
                <h1>Dernier commentaire publié</h1>
                <p>"<?= $lastComment['contenu'] ?>"</p>
                <?php $last_comment_date_fr = DateTime::createFromFormat('Y-m-d', $lastComment['date_creation']);?>
                <p>Publié par <b><?= $lastComment['auteur'] ?></b>, le <?= $last_comment_date_fr->format('d/m/Y') ?></p>
            </div>
            <div id="about_author">
                <h1>Aperçu de l'auteur</h1>
                <p>Jean est né un jour, puis il a grandi.</p><p>Depuis, il est devenu écrivain</p><p>N'est-ce pas merveilleux ?<a href="index.php?action=page&amp;name=author"> Accéder à la biographie de l'auteur</a></p>
            </div>
            <div id="press_comments">
                <h1>La presse en parle</h1>
                <p id="press_review">Au vu du nouveau projet de Jean Forteroche, le critique peut enfin penser : "Voici un projet engagé, qui saura remettre les pendules à l'heure." Et ainsi de se dire : merci, Jean Forteroche</p>
                <p>Alain Forteroche, la France des Livres (Mai 2019) <a href="#">Lien vers l'archive</a></p>
            </div>
            <div id="bonus">
                <h1>Le coin des goodies</h1>
                <a href="index.php?action=page&amp;name=ours"><p>Photographie d'un ours (exclusif !) -></p></a>
            </div>
        </div>


        <div id="last_posts">

            <h1>Aperçu des 3 derniers chapitres publiés</h1>

            <?php

            while ($data = $posts->fetch())
            {
                $date_creation_fr = DateTime::createFromFormat('Y-m-d', $data['date_creation']);
                ?>
                <div id="post_extract">
                    <h4><a class="plain_link" href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= $data['titre'] ?></a></h4>
                    <p><?= substr($data['contenu'],0,700) ?>... <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a></p>
                    <p>
                        <i>Publié le <?= $date_creation_fr->format('d/m/Y') ?> par votre serviteur, <?= $data['auteur'] ?></i>
                        <img id="signature" alt="signature" src="public/assets/signature.png">
                        <?php // Pour affichage "pas de commentaires" ou "1 commentaire" ou "x commentaires"
                            $nbComments = commentsNb($data['id']);
                            if ($nbComments['COUNT(ID)'] == 0)
                            { ?>
                                <p><a href="index.php?action=post&amp;id=<?= $data['id'] ?>#see_comments">Pas de commentaires</a></p>
                            <?php }
                            elseif ($nbComments['COUNT(ID)'] == 1)
                            { ?>
                                <p><a href="index.php?action=post&amp;id=<?= $data['id'] ?>#see_comments">1 commentaire</a></p>
                            <?php }
                            else
                            { ?>
                                <p><a href="index.php?action=post&amp;id=<?= $data['id'] ?>#see_comments"><?= $nbComments['COUNT(ID)'] ?> commentaires</a></p>
                            <?php }

                        ?>
                    </p>
                </div>
                <?php
            }

            $posts->closeCursor();

            ?>

        </div>

        <footer>
            <hr>
            <div>
                <p><a href="#">Mentions légales</a></p>
                <p>&copy; Jean Forteroche 2019</p>
                <p><a href="#">Connexion</a></p>
            </div>
        </footer>

    </body>

</html>
