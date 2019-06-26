<h1>Modification d'un chapitre</h1><br>

<div id="update_chapter">
    <form action="index.php?action=updatePost&id=<?= $currentId ?>" method="post">
        <label for="modified_title">Titre du chapitre :</label>
        <input type="text" id="modified_title" name="modified_title" value="<?= $currentTitle ?>"></input><br><br>
        <textarea id="modified_content" name="modified_content"><?= $currentContent ?></textarea><br>
        <input type="submit" value="Enregistrer les modifications" id="modified_chapter_submit"></input>
        <a href="index.php?action=adminLog&name=chapters">Annuler</a>
    </form>
</div>
