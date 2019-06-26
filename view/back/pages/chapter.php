<h1><?= $chapter['titre'] ?></h1><br>
<div><?= $chapter['contenu'] ?></div><br>
<p>
    <a href="index.php?action=adminLog&name=chapters">Retour à la liste des articles</a>
    <a href="index.php?action=adminLog&name=updatechapter&id=<?= $chapter['id'] ?>" class="changeLink">Retoucher</a>
    <a href="index.php?action=adminLog&name=deleteconfirm&id=<?= $chapter['id'] ?>" class="delete_link">Supprimer</a>
</p>
