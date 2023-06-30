<?php
$categories = $result["data"]['categories'];
// var_dump($category);
// die;
?>


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