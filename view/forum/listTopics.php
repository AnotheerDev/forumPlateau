<?php

$topics = $result["data"]['topics'];
// var_dump($topics);
// die;
?>

<h2>liste topics</h2>

<?php
foreach ($topics as $topic) {
    // var_dump($topic);
?>
    <a href="index.php?ctrl=forum&action=listTopicsByCat&id=<?= $topic->getId() ?>">
        <p><?= $topic->getTitle() . " " . $topic->getdateCreation() ?></p>
    </a>

<?php
}
