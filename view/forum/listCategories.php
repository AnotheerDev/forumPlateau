<?php
$categories = $result["data"]['categories'];
// var_dump($category);
// die;
?>

<h1>Liste des catégories</h1>

<?php
foreach ($categories as $category) {
?>
    <a href="index.php?ctrl=forum&action=listTopicsByCat&id=<?= $category->getId() ?>">
        <p><?= $category->getName() ?></p>
    </a>

<?php
}
?>