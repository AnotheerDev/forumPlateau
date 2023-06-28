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