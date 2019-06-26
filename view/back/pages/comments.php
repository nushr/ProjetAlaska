<h1>Modération des commentaires</h1><br>
<div>Voici les commentaires actuellement signalés comme outrageants :</div><br>

<?php while($data = $comments->fetch())
{
$commentDate = DateTime::createFromFormat('Y-m-d', $data['date_creation']);
$commentChapter = $adminManager->getChapterNb($data['post_id']);
?>

    <p>" <?= $data['contenu'] ?> "</p>
    <p>Publié par <b><?= $data['auteur'] ?></b>, le <?= $commentDate->format('d/m/Y') ?>, à propos du <a href="index.php?action=adminLog&name=chapter&id=<?= $data['post_id'] ?>"><?= $commentChapter['titre'] ?></p>
    <p>
        <span><a href="index.php?action=allowComment&id=<?= $data['id'] ?>" class="allow_comment_link">Autoriser le commentaire</a></span>
        <span><a href="index.php?action=deleteComment&id=<?= $data['id'] ?>" class="delete_comment_link">Supprimer le commentaire</a></span>
    </p><br>

<?php }
$comments->closeCursor();
?>
