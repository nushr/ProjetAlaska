<h1>Liste des chapitres publiés</h1><br>

<?php

while ($data = $chapters->fetch())
{
    ?>
    <p>
        <a href="index.php?action=adminLog&name=chapter&id=<?= $data['id'] ?>"><?= $data['titre'] ?></a>
        <a href="index.php?action=adminLog&name=updatechapter&id=<?= $data['id'] ?>" class="changeLink">Retoucher</a>
        <a href="index.php?action=adminLog&name=deleteconfirm&id=<?= $data['id'] ?>" class="delete_link">Supprimer</a>
    </p>
    <?php
}

$chapters->closeCursor();
?>
