<?php

require_once('model/front/PostManager.php');
require_once('model/front/CommentManager.php');


function chaptersList()
{
    $postManager = new PostManager();

    $posts = $postManager->listChapters();
}

function templateView($page)
{

    if ($page == "chapters")
    {
        $postManager = new PostManager();
        $posts = $postManager->listChapters();

        $title="Billet simple pour l'Alaska : les chapitres" ?>

        <?php ob_start(); ?>

        <h1>Liste des chapitres publiés</h1><br>

        <?php

        while ($data = $posts->fetch())
        {
            ?>
            <p><a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= $data['titre'] ?></a></p>

            <?php
        }

        $posts->closeCursor();
        ?>

        <?php $content = ob_get_clean();

        require('view/front/templateView.php');
    }

    else
    {
        if ($page == "author")
        {
            $title="Billet simple pour l'Alaska : à propos de l'auteur"; ?>

            <?php ob_start(); ?>

            <img id="author_pic" alt="portrait" src="public/assets/portrait.jpg">

            <h1>A propos de l'auteur</h1><br>

            <p>On peut dire que l'année 1942 a eu de la chance : elle m'a vu naître.</p><br>
            <p>Biographie : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
            <p>Sélection bibliographique : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
            <p><img alt="signature" src="public/assets/signature.png"></p>

            <?php $content = ob_get_clean();
        }

        elseif ($page == "contact")
        {
            $title="Billet simple pour l'Alaska : contact" ?>

            <?php ob_start(); ?>

            <h1>Contact</h1><br>

            <p>Cher lecteur, j'en suis certain, tu t'es déjà demandé : mais comment diable écrire à Jean Forteroche ?</p><br>
            <p>Heureusement pour toi, grâce à l'internet, c'est aujourd'hui très simple.</p><br>

            <div id="contact_bloc">
                <div>
                    <p><strong>Adresse postale</strong><br>4 chemin du Circuit<br>48980 Fortenouvelle</p><br>
                </div>
                <div id="send_mail_form">
                    <p><strong>Envoi automatisé d'un mél</strong></p>
                    <form method="post" action="#">
                        <label for="sender_name">Nom :</label><br>
                        <input type="text" id="sender_name" name="sender_name" required></input><br>
                        <label for="sender_text">Message :</label><br>
                        <textarea for="sender_text" id="sender_name" name="sender_name" required></textarea><br>
                        <input type="submit" value="Envoyer">
                    </form>
                </div>
            </div>

            <?php $content = ob_get_clean();
        }

        elseif ($page == "novel")
        {
            $title="Billet simple pour l'Alaska : le roman" ?>

            <?php ob_start(); ?>

            <h1>Le nouveau projet de Jean</h1><br>

            <div>
                <p>Cher lecteur, attention les yeux.</p><br>
                <p>Après mon dernier roman consacré à comment j'ai décidé de devenir constructeur de véhicules motorisés, je vais maintenant vous faire voyager.</p><br>
                <p>Je vais vous emmener dans le grand nord pour une expédition digne des plus grands expéditeurs.</p><br>
                <p>Accrochez-vous, ça va être du solide !</p><br>
                <p><img alt="signature" src="public/assets/signature.png"></p>
            </div>

            <?php $content = ob_get_clean();
        }

        elseif ($page == "ours")
        {
            $title="Billet simple pour l'Alaska : photo exclusive"; ?>

            <?php ob_start(); ?>

            <div id="bear_bloc"><a href="index.php"><img id="bear_pic" alt="Ours polaire" src="public/assets/ours.jpg"></a></div>

            <?php $content = ob_get_clean();
        }

        elseif ($page == "recipe")
        {
            $title="Billet simple pour l'Alaska : recette de la Bombe Alaska"; ?>

            <?php ob_start(); ?>

            <h1>Recette de la Bombe Alaska ('Alaska Bomb')</h1>
            <br>
            <p>Warning : il y a du level ici. Si vous ne savez faire que le brownie mal cuit, passez votre chemin !</p><br>
            <div>
                <p>Pour la glace :</p>
                <ul>
                    <li>1 litre de glace vanille (maison bien entendu)</li>
                    <li>200g de framboises fraîches</li>
                    <li>100g de pistaches non salées</li>
                </ul>
                <p>Pour la génoise :</p>
                <ul>
                    <li>50g de farine</li>
                    <li>30g de poudre d'amande</li>
                    <li>1/2 c.à.c. de levure chimique</li>
                    <li>2 oeufs</li>
                    <li>50g de sucre en poudre</li>
                    <li>30g de beurre fondu</li>
                </ul>
                <p>Pour la meringue :</p>
                <ul>
                    <li>3 blancs d'oeuf</li>
                    <li>80g de sucre en poudre</li>
                    <li>80g de sucre glace</li>
                </ul>
                <br>
                <p>Instructions :</p>
                <br>
                <p>Chemisez un cul de poule de papier sulfurisé. Attention à bien prendre un cul de poule de la taille de votre moule ou légèrement plus petit.<br>Versez la glace vanille, les framboises et les pistaches en alternant les couches. N'hésitez pas à regarder la vidéo en cas de doute.<br>Lissez avec une cuillère à soupe en placez au congélateur pour 2 heures au minimum. Vous pouvez faire cette partie la veille ou même plusieurs jours à l'avance si besoin.<br>En attendant, préparez la génoise.<br>Préchauffez le four à 160°C.<br>Dans un récipient, mélangez ensemble la farine, la poudre d'amande et la levure. Dans un autre récipient, fouettez ensemble les œufs et le sucre jusqu'à ce que le mélange blanchisse. Ajoutez les poudres (farine, poudre d'amande et levure) et mélangez. Incorporez le beurre fondu et mélangez de nouveau.<br><br>Versez la préparation dans un moule à manqué (20 cm dans l'idéal) beurré et fariné. Enfournez 15 minutes.<br>Laissez refroidir complètement.</p>
                <p>Pour la meringue, fouettez les blancs en neige en ajoutant progressivement le sucre en poudre. Fouettez une dizaine de minutes, à forte vitesse, jusqu'à ce que les blancs soient bien fermes.<br>Incorporez ensuite le sucre glace et fouettez de nouveau 30 secondes à vitesse moyenne.<br><br>Démoulez la génoise et placez-la directement sur votre plat de service. Si vous souhaitez l'imbiber, vous pouvez faire chauffer 5 cl d'eau avec 30 g de sucre en poudre et 1 cuillère à soupe de Grand Marnier. Portez à ébullition et laissez bouillir 3 minutes.<br>Imbibez le biscuit de sirop avec un pinceau alimentaire.<br><br>Démoulez la glace et placez-la sur la génoise.<br>Recouvrez ensuite entièrement de meringue en faisant attention à ne laisser aucun trou. C'est important car la meringue empêche la glace de fondre quand vous passerez le chalumeau !<br><br>Avec une spatule, formez des petites vagues avec la meringue, tout autour de la bombe Alaska.<br><br>Yummi !</p>
            </div>

            <?php $content = ob_get_clean();
        }

        elseif ($page == "mentions")
        {
            $title="Billet simple pour l'Alaska : mentions légales & crédits"; ?>

            <?php ob_start(); ?>

            <h1>Mentions légales & crédits</h1>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
            <p><a href="index.php">Retour à l'accueil</a></p>

            <?php $content = ob_get_clean();
        }

        elseif ($page == "connexion")
        {
            $title="Billet simple pour l'Alaska : connexion"; ?>

            <?php ob_start(); ?>

            <h1>Connexion à l'espace d'administration</h1>
            <br>

            <form id="connexion_form" method="post" action="index.php?action=connexion">
                <label for="id">Adresse de messagerie :</label><br>
                <input type="text" name="id" id="id" required><br>
                <label for="pwd">Mot de passe :</label><br>
                <input type="password" name="pwd" id="pwd" required><br>
                <input type="submit" value="Soumettre">
            </form>

            <br><a href="#">Mot de passe oublié ?</a>

            <?php $content = ob_get_clean();
        }

        else
        {
            throw new Exception('This page has not been written by Jean Forteroche yet');
        }

        require('view/front/templateView.php');

    }

}
