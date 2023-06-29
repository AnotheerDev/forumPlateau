<?php

$topics = $result["data"]['topics'];
// $category = $result["data"]['category'];
// var_dump($topics);
// die;
?>

<h2>Liste des topics</h2>

<?php
foreach ($topics as $topic) {
    // var_dump($topic);
?>
    <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">
        <p><?= $topic->getTitle() . " " . $topic->getdateCreation() ?></p>
    </a>

<?php
}
