<?php

$topics = $result["data"]['topics'];
// $category = $result["data"]['category'];
// var_dump($topics);
// die;
?>



<h2>Liste des topics</h2>

<ul class="topic-list">
    <?php foreach ($topics as $topic) { ?>
        <li class="topic-list-item">
            <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">
                <div class="topic-box">
                    <div class="topic-box-title"><?= $topic->getTitle() ?></div>
                    <div class="topic-box-info"><?= $topic->getdateCreation() ?></div>
                </div>
            </a>
        </li>
    <?php } ?>
</ul>