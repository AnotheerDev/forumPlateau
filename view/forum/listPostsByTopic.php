<?php
// Exemple de comment récupérer les données envoyées par le contrôleur //
$topic = $result["data"]["topic"];
$posts = $result["data"]["posts"];
// $member = $result["data"]["member"];
?>

<h2>Liste des posts du topic : <?= $topic->getTitle() ?></h2>

<?php
if ($posts) {
    foreach ($posts as $post) {
        // var_dump($post);
?>
        <p>Créé par : <?= $post->getMember()->getId() ?> - <?= $post->getMember()->getNickname() ?></p>
        <p>Créé le <?= $post->getDateCreation() ?></p>
        <p><?= $post->getContent() ?></p>
        <br>
<?php
    }
} else {
    echo "<p>Pas de post dans ce topic</p>";
}
?>

<form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method='POST'>
    <label for="post">Message :</label><br>
    <textarea name="post" rows="4" placeholder="Entrez votre message" required></textarea><br>
    <input type="submit" name="submit" value="submit">
</form>