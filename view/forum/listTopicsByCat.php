<?php
$category = $result["data"]['category'];
$topics = $result["data"]['topics'];

?>

<h2>liste topics de la catégorie <?= $category->getName() ?></h2>

<?php
if ($topics) {
    foreach ($topics as $topic) {
?>

        <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">
            <p><?= $topic->getTitle() ?></p>
        </a>
        <p>Créé le : <?= $topic->getDateCreation() ?></p>
        <p>Créé par : <?= $topic->getMember()->getNickname() ?></p>

<?php
    }
} else {
    echo "<h2>Pas de topic dans la catégorie</h2>";
}

?>


<h2>Ajouter un nouveau topic</h2>

<form action="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>" method="POST">
    <label for="title">Titre du topic :</label>
    <input type="text" name="title" id="title" placeholder="Entrez le titre du topic" required><br>

    <label for="post">Message :</label>
    <textarea name="post" id="post" rows="4" placeholder="Entrez votre message" required></textarea><br>

    <input type="submit" name="submit" value="Ajouter">
</form>