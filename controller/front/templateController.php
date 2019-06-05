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
                        <label for="sender_address">Adresse mail : </label><br>
                        <input type="text" id="sender_address" name="sender_address" required></input><br>
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
            <p>Warning : il y a du level ici. Si vous ne savez faire que le brownie au chocolat, passez votre chemin !</p><br>
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
            <h3>1. Présentation du site.</h3>
            <p>En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi :</p>
            <p>
                <strong>Propriétaire</strong> : Forteroche inc. – Auteur – 4, chemin du Circuit / 48980 Fortenouvelle<br /><strong>Responsable publication</strong> : Jean Forteroche – forterochedu44@laposte.net<br />Le responsable publication est une personne physique ou une personne morale.<br />
                <strong>Webmaster</strong> : RN – admin@nusr.me<br />
                <strong>Hébergeur</strong> : 1&1 Ionos – 7 place de la Gare / 57201 SARREGUEMINES<br />
                <strong>Crédits</strong> : Le modèle de mentions légales est offert par Subdelirium.com <a target="_blank" href="https://www.subdelirium.com/generateur-de-mentions-legales/" rel="noopener" target="_blank">https://www.subdelirium.com/generateur-de-mentions-legales/</a>
            </p><br>
            <h3>2. Conditions générales d’utilisation du site et des services proposés.</h3>
            <p>L’utilisation du site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> implique l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, les utilisateurs du site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> sont donc invités à les consulter de manière régulière.</p>
            <p>Ce site est normalement accessible à tout moment aux utilisateurs. Une interruption pour raison de maintenance technique peut être toutefois décidée par Forteroche inc., qui s’efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l’intervention.</p>
            <p>Le site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> est mis à jour régulièrement par Jean Forteroche. De la même façon, les mentions légales peuvent être modifiées à tout moment : elles s’imposent néanmoins à l’utilisateur qui est invité à s’y référer le plus souvent possible afin d’en prendre connaissance.</p><br>
            <h3>3. Description des services fournis.</h3>
            <p>Le site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> a pour objet de fournir une information concernant l’ensemble des activités de la société.</p>
            <p>Forteroche inc. s’efforce de fournir sur le site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> des informations aussi précises que possible. Toutefois, il ne pourra être tenue responsable des omissions, des inexactitudes et des carences dans la mise à jour, qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.</p>
            <p>Tous les informations indiquées sur le site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> sont données à titre indicatif, et sont susceptibles d’évoluer. Par ailleurs, les renseignements figurant sur le site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> ne sont pas exhaustifs. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne.</p><br>
            <h3>4. Limitations contractuelles sur les données techniques.</h3>
            <p>Le site utilise la technologie JavaScript.</p>
            <p>Le site Internet ne pourra être tenu responsable de dommages matériels liés à l’utilisation du site. De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour</p><br>
            <h3>5. Propriété intellectuelle et contrefaçons.</h3>
            <p>Forteroche inc. est propriétaire des droits de propriété intellectuelle ou détient les droits d’usage sur tous les éléments accessibles sur le site, notamment les textes, images, graphismes, logo, icônes, sons, logiciels.</p>
            <p>Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de : Forteroche inc..</p>
            <p>Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.</p><br>
            <h3>6. Limitations de responsabilité.</h3>
            <p>Forteroche inc. ne pourra être tenue responsable des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès au site alaska.nusr.me, et résultant soit de l’utilisation d’un matériel ne répondant pas aux spécifications indiquées au point 4, soit de l’apparition d’un bug ou d’une incompatibilité.</p>
            <p>Forteroche inc. ne pourra également être tenue responsable des dommages indirects (tels par exemple qu’une perte de marché ou perte d’une chance) consécutifs à l’utilisation du site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a>.</p>
            <p>Des espaces interactifs (possibilité de poser des questions dans l’espace contact) sont à la disposition des utilisateurs. Forteroche inc. se réserve le droit de supprimer, sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait à la législation applicable en France, en particulier aux dispositions relatives à la protection des données. Le cas échéant, Forteroche inc. se réserve également la possibilité de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur, notamment en cas de message à caractère raciste, injurieux, diffamant, ou pornographique, quel que soit le support utilisé (texte, photographie…).</p><br>
            <h3>7. Gestion des données personnelles.</h3>
            <p>En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, l'article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995.</p>
            <p>A l'occasion de l'utilisation du site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a>, peuvent êtres recueillies : l'URL des liens par l'intermédiaire desquels l'utilisateur a accédé au site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a>, le fournisseur d'accès de l'utilisateur, l'adresse de protocole Internet (IP) de l'utilisateur.</p>
            <p> En tout état de cause Forteroche inc. ne collecte des informations personnelles relatives à l'utilisateur que pour le besoin de certains services proposés par le site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a>. L'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu'il procède par lui-même à leur saisie. Il est alors précisé à l'utilisateur du site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> l’obligation ou non de fournir ces informations.</p>
            <p>Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, tout utilisateur dispose d’un droit d’accès, de rectification et d’opposition aux données personnelles le concernant, en effectuant sa demande écrite et signée, accompagnée d’une copie du titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée.</p>
            <p>Aucune information personnelle de l'utilisateur du site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> n'est publiée à l'insu de l'utilisateur, échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule l'hypothèse du rachat de Forteroche inc. et de ses droits permettrait la transmission des dites informations à l'éventuel acquéreur qui serait à son tour tenu de la même obligation de conservation et de modification des données vis à vis de l'utilisateur du site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a>.</p>
            <p>Le site n'est pas déclaré à la CNIL car il ne recueille pas d'informations personnelles. .</p>
            <p>Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.</p><br>
            <h3>8. Liens hypertextes et cookies.</h3>
            <p>Le site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> contient un certain nombre de liens hypertextes vers d’autres sites, mis en place avec l’autorisation de Forteroche inc.. Cependant, Forteroche inc. n’a pas la possibilité de vérifier le contenu des sites ainsi visités, et n’assumera en conséquence aucune responsabilité de ce fait.</p>
            <p>La navigation sur le site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> est susceptible de provoquer l’installation de cookie(s) sur l’ordinateur de l’utilisateur. Un cookie est un fichier de petite taille, qui ne permet pas l’identification de l’utilisateur, mais qui enregistre des informations relatives à la navigation d’un ordinateur sur un site. Les données ainsi obtenues visent à faciliter la navigation ultérieure sur le site, et ont également vocation à permettre diverses mesures de fréquentation.</p>
            <p>Le refus d’installation d’un cookie peut entraîner l’impossibilité d’accéder à certains services. L’utilisateur peut toutefois configurer son ordinateur de la manière suivante, pour refuser l’installation des cookies :</p>
            <p>Sous Internet Explorer : onglet outil (pictogramme en forme de rouage en haut a droite) / options internet. Cliquez sur Confidentialité et choisissez Bloquer tous les cookies. Validez sur Ok.</p>
            <p>Sous Firefox : en haut de la fenêtre du navigateur, cliquez sur le bouton Firefox, puis aller dans l'onglet Options. Cliquer sur l'onglet Vie privée. Paramétrez les Règles de conservation sur : utiliser les paramètres personnalisés pour l'historique. Enfin décochez-la pour désactiver les cookies.</p>
            <p>Sous Safari : Cliquez en haut à droite du navigateur sur le pictogramme de menu (symbolisé par un rouage). Sélectionnez Paramètres. Cliquez sur Afficher les paramètres avancés. Dans la section "Confidentialité", cliquez sur Paramètres de contenu. Dans la section "Cookies", vous pouvez bloquer les cookies.</p>
            <p>Sous Chrome : Cliquez en haut à droite du navigateur sur le pictogramme de menu (symbolisé par trois lignes horizontales). Sélectionnez Paramètres. Cliquez sur Afficher les paramètres avancés. Dans la section "Confidentialité", cliquez sur préférences. Dans l'onglet "Confidentialité", vous pouvez bloquer les cookies.</p><br>
            <h3>9. Droit applicable et attribution de juridiction.</h3>
            <p>Tout litige en relation avec l’utilisation du site <a href="http://alaska.nusr.me/" target="_blank">alaska.nusr.me</a> est soumis au droit français. Il est fait attribution exclusive de juridiction aux tribunaux compétents de Paris.</p><br>
            <h3>10. Les principales lois concernées.</h3>
            <p>Loi n° 78-17 du 6 janvier 1978, notamment modifiée par la loi n° 2004-801 du 6 août 2004 relative à l'informatique, aux fichiers et aux libertés.</p>
            <p> Loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique.</p><br>
            <h3>11. Lexique.</h3>
            <p>Utilisateur : Internaute se connectant, utilisant le site susnommé.</p>
            <p>Informations personnelles : « les informations qui permettent, sous quelque forme que ce soit, directement ou non, l'identification des personnes physiques auxquelles elles s'appliquent » (article 4 de la loi n° 78-17 du 6 janvier 1978).</p>

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
