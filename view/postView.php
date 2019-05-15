<!DOCTYPE HTML>

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <title>Billet simple pour l'Alaska : un chapitre</title>

        <meta name="description" content="Un chapitre du nouveau roman de Jean Forteroche">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="public/styles/styles.css">

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

                $nbPosts = postsNb();

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
                if ($post['id']<$nbPosts['COUNT(ID)'])
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
            <p><?= $post['contenu'] ?></p><br>
            <p><img alt="signature" src="public/assets/signature.png"></p>
            <br>
            <?php
            if ($nbComments['COUNT(ID)'] == 1)
            { ?>
                <h3 id="see_comments">Afficher le commentaire</h3><br>
            <?php }
            elseif ($nbComments['COUNT(ID)'] == 0)
            { ?>
                <h3 id="see_comments" class="no_comments">Pas de commentaires</h3><br>
            <?php }
            elseif ($nbComments['COUNT(ID)'] > 1)
            { ?>
                <h3 id="see_comments">Afficher les commentaires (<?= $nbComments['COUNT(ID)'] ?>)</h3><br>
            <?php }
            ?>
            <div id="comments_block">
                <?php
                while ($comment = $comments->fetch())
                {
                    $date_creation_fr = DateTime::createFromFormat('Y-m-d', $comment['date_creation']);
                    ?>
                    <div>
                        <?php
                        if ($comment['signale'])
                        { ?>
                            <p class="signal_warning">Ce commentaire a été signalé comme inapproprié.<br>Il a été masqué en attendant sa modération</p>
                            <p>Publié par <b><?= $comment['auteur'] ?></b> le <?= $date_creation_fr->format('d/m/Y') ?>.</p>
                        <?php }
                        else
                        { ?>
                            <p><i>" <?= $comment['contenu'] ?> "</i></p>
                            <p>Publié par <b><?= $comment['auteur'] ?></b> le <?= $date_creation_fr->format('d/m/Y') ?>. <a id="comment_signal" href="index.php?action=signalComment&id=<?= $comment['id'] ?>&init_post=<?= $comment['post_id'] ?>">Signaler</a></p>
                        <?php } ?>
                        <br>
                    </div>
                    <?php
                }
                ?>
            </div>

            <?php
            if ($nbComments['COUNT(ID)'] == 0)
            { ?>
                <h3 id="add_comment">Ajouter le premier commentaire</h3><br>
            <?php }
            else
            { ?>
                <h3 id="add_comment">Ajouter un commentaire</h3><br>
            <?php }
            ?>

            <div id="add_comment_block">
                <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                    <div>
                        <label for="author">Pseudo</label><br>
                        <input type="text" id="author" name="author">
                    </div>
                    <div>
                        <label for="message">Commentaire</label><br>
                        <textarea id="message" name="message"></textarea>
                    </div>
                    <div>
                        <input type="submit">
                    </div>
                </form>
            </div>
        </div>

        <script src="public/script/script.js"></script>

    </body>

</html>
