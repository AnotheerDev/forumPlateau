<?php
$categories = $result["data"]['categories'];
// var_dump($category);
// die;
?>

<style>
    .category-list {
        list-style: none;
        padding: 0;
    }

    .category-list-item {
        margin-bottom: 10px;
        width: 150px;
    }

    .category-list-item a {
        display: block;
        background-color: #272729;
        border: 1px solid grey;
        border-radius: 4px;
        padding: 10px;
        text-decoration: none;
        color: white;
        transition: background-color 0.3s;
    }

    .category-list-item a:hover {
        background-color: #535e72;
    }
</style>

<h2>Liste des catégories :</h2>

<ul class="category-list">
    <?php
    foreach ($categories as $category) {
    ?>
        <li class="category-list-item">
            <a href="index.php?ctrl=forum&action=listTopicsByCat&id=<?= $category->getId() ?>">
                <?= $category->getName() ?>
            </a>
        </li>
    <?php
    }
    ?>
</ul>