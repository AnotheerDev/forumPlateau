<?php
$categories = $result["data"]['categories'];
// var_dump($category);
// die;
?>

<h2>Liste des catégories</h2>

<?php
foreach ($categories as $category) {
?>
    <a href="index.php?ctrl=forum&action=listTopicsByCat&id=<?= $category->getId() ?>">
        <p><?= $category->getName() ?></p>
    </a>

<?php
}
?>