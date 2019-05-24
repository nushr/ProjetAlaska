<?php

class PageManager
{

    public function displayChaptersPage($page, $posts)
    {
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

        require('view/front/elseView.php');
    }

    public function displayElsePage($page)
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

            <p><strong>Adresse postale</strong><br>4 chemin de la Masse Salariale<br>48980 Fortenouvelle</p>

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

            <form method="post" action="index.php?action=connexion">
                <label for="id">Adresse de messagerie :</label><br>
                <input type="text" name="id" id="id" required><br>
                <label for="pwd">Mot de passe :</label><br>
                <input type="password" name="pwd" id="pwd" required><br><br>
                <input type="submit" value="Soumettre">
            </form>

            <br><a href="#">Mot de passe oublié ?</a>

            <?php $content = ob_get_clean();
        }

        else
        {
            $title="Erreur !"; ?>

            <?php ob_start(); ?>

            <h1>Error</h1><br>
            <div>This page has not been written by Jean Forteroche yet</div>

            <?php $content = ob_get_clean();
        }

        require('view/front/elseView.php');

    }

} ?>
