<?php
$categories = $result["data"]['categories'];
// var_dump($result);
// die;
?>

<h1>Liste des catégories</h1>

<?php
foreach ($categories as $category) {
?>
    <p><?= $category->getName() ?></p>
<?php
}
?>