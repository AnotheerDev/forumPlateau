<?php

$topics = $result["data"]['topics'];
// $category = $result["data"]['category'];
// var_dump($topics);
// die;
?>

<style>
    .topic-list {
        list-style: none;
        padding: 0;
        margin-bottom: 20px;
    }

    .topic-list-item {
        margin-bottom: 10px;
        display: flex;
        /* justify-content: center; */
    }

    .topic-list-item .topic-box {
        width: 350px;
        background-color: #272729;
        border: 1px solid grey;
        border-radius: 4px;
        padding: 10px;
        color: #333;
    }

    .topic-list-item .topic-box:hover {
        background-color: #535e72;
    }

    .topic-box-title {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
        color: white;
    }

    .topic-box-info {
        font-size: 12px;
        color: #888;
    }
</style>

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