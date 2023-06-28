<?php
$category = $result["data"]['category'];
$topics = $result["data"]['topics'];

?>

<h1>liste topics de la catégorie <?= $category->getName() ?></h1>

<?php
if ($topics) {
    foreach ($topics as $topic) {
?>

        <p><?= $topic->getTitle() ?></p>
        <p>Créé le : <?= $topic->getDateCreation() ?></p>
        <p>Créé par : <?= $topic->getMember()->getNickname() ?></p>

<?php
    }
} else {
    echo "<h1>Pas de topic dans la catégorie</h1>";
}
?>