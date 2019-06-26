<!DOCTYPE HTML>
<!-- For homepage -->

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <title>Billet simple pour l'Alaska : le blog du roman</title>

        <meta name="description" content="Le nouveau roman de Jean Forteroche, en publication exclusive, ici, par épisodes">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="public/styles/styles.css">
        <link rel="stylesheet" href="public/styles/media.css">

        <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet">

    </head>

    <body>

        <header>
            <h1>Billet simple pour l'Alaska</h1>
            <img alt="illustration alaska" src="public/assets/C3119-02.jpg">
            <h3>Le nouveau roman de Jean Forteroche</h3>
        </header>

        <div id="menu">
            <hr>
            <menu>
                <p><a href="index.php?action=page&amp;name=author">A propos de l'auteur</a></p>
                <p><a href="index.php?action=page&amp;name=novel">Le roman</a></p>
                <p><a href="index.php?action=page&amp;name=chapters">Liste des chapitres publiés</a></p>
                <p><a href="index.php?action=page&amp;name=contact">Contact</a></p>
            </menu>
            <hr>
        </div>

        <div id="home_widgets">
            <!-- 1 -->
            <div id="last_comment">
                <?php $lastComment = lastComment() ?>
                <h1>Dernier commentaire publié</h1>
                <p>"<?= $lastComment['contenu'] ?>"</p>
                <?php $last_comment_date_fr = DateTime::createFromFormat('Y-m-d', $lastComment['date_creation']);?>
                <p>Publié par <b><?= $lastComment['auteur'] ?></b>, le <?= $last_comment_date_fr->format('d/m/Y') ?></p>
            </div>
            <!-- 2 -->
            <div id="about_author">
                <h1>Aperçu de l'auteur</h1>
                <p>Jean est né un jour, puis il a grandi.</p><p>Depuis, il est devenu écrivain et multiplie les innovations novatrices et audacieuses.</p><p>Vous voulez en savoir plus ?<a href="index.php?action=page&amp;name=author"> Accéder à la biographie de l'auteur</a></p>
            </div>
            <!-- 3 -->
            <div id="press_comments">
                <h1>La presse en parle</h1>
                <p id="press_review">Au vu du nouveau projet de Jean Forteroche, le critique peut enfin penser : "Voici un projet engagé, qui saura remettre les pendules à l'heure." Et ainsi de se dire : merci, Jean Forteroche</p>
                <p>Alain Forteroche, la France des Livres (Mai 2019) <a href="#">Lien vers l'archive</a></p>
            </div>
            <!-- 4 -->
            <div id="bonus">
                <h1>Le coin des goodies</h1>
                <a href="index.php?action=page&amp;name=ours#bear_bloc"><p>-> Photographie d'un ours (exclusif !)</p></a>
                <a href="index.php?action=page&amp;name=recipe"><p>-> Recette du dessert "Alaska Bomb" (total gourmand ;-)</p></a>
            </div>
        </div>

        <div id="last_posts">

            <h1>Aperçu des 3 derniers chapitres publiés</h1>

            <?php

            while ($data = $posts->fetch())
            {
                $date_creation_fr = DateTime::createFromFormat('Y-m-d', $data['date_creation']);
                ?>
                <div class="post_extract">
                    <h4><a class="plain_link" href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= $data['titre'] ?></a></h4>
                    <p><?= substr($data['contenu'],0,700) ?>... <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a></p>
                    <p>
                        <i>Publié le <?= $date_creation_fr->format('d/m/Y') ?> par votre serviteur, <?= $data['auteur'] ?></i>
                        <img class="signature" alt="signature" src="public/assets/signature.png">
                        <?php // Retrieves number of comments for direct link from homepage
                            $nbComments = commentsNb($data['id']);
                            if ($nbComments['COUNT(ID)'] == 0)
                            { ?>
                                <p><a href="index.php?action=post&amp;id=<?= $data['id'] ?>#see_comments" class="see_comments_link">Pas de commentaires</a></p>
                            <?php }
                            elseif ($nbComments['COUNT(ID)'] == 1)
                            { ?>
                                <p><a href="index.php?action=post&amp;id=<?= $data['id'] ?>#see_comments" class="see_comments_link">1 commentaire</a></p>
                            <?php }
                            else
                            { ?>
                                <p><a href="index.php?action=post&amp;id=<?= $data['id'] ?>#see_comments" class="see_comments_link"><?= $nbComments['COUNT(ID)'] ?> commentaires</a></p>
                            <?php }

                        ?>
                    </p>
                </div>
                <?php
            }

            $posts->closeCursor();  ?>

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
