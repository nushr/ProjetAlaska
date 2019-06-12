<!DOCTYPE HTML>
<!-- For single post display === reading mode -->

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <title>Billet simple pour l'Alaska : mode lecture</title>

        <meta name="description" content="Un chapitre du nouveau roman de Jean Forteroche">
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

        <menu>
            <hr>
            <div>
                <?php
                $lastPost = getLastPostId(); // to know which post is last (navigation display purpose)
                $nextPost = getNextPostId($_GET['id']); // to reach for next post id in database
                $prevPost = getPrevPostId($_GET['id']); // to reach for previous post id in databse

                if ($_GET['id']>1)
                { // menu elements display according to post position in line
                    ?><p><a href="index.php?action=post&amp;id=<?= $prevPost[0] ?>">Chapitre précédent</a></p><?php
                }
                else {
                    ?><p class="nav_disabled">Chapitre précédent</p><?php
                }
                ?>
                <p><a href="index.php">Retour à l'accueil</a></p>
                <?php
                if ($_GET['id']<$lastPost[0])
                {
                    ?><p><a href="index.php?action=post&amp;id=<?= $nextPost[0] ?>">Chapitre suivant</a></p><?php
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

            <?php // checks whether there are comments for accurate display
            if ($nbComments['COUNT(ID)'] == 0)
            { ?>
                <h3 id="see_comments" class="no_comments">Pas de commentaires</h3><br>
            <?php }
            else
            { ?>
                <h3 id="see_comments">Afficher les commentaires (<?= $nbComments['COUNT(ID)'] ?>)</h3><br>
            <?php }
            ?>
            <div id="comments_block">
                <?php // comments display formatting
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

            <?php // checks whether there are comments for accurate display
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
                <form id="comment_form" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                    <div>
                        <label for="author">Pseudo :</label><br>
                        <input type="text" id="author" name="author">
                    </div>
                    <div>
                        <label for="message">Commentaire :</label><br>
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
