<?php
$topic = $result["data"]["topic"];
$posts = $result["data"]["posts"];
// $member = $result["data"]["member"];
?>


<div class="container">
    <div class="posts-column">
        <?php
        if ($posts) {
            foreach ($posts as $post) {
                // var_dump($post);
        ?>
                <div class="post-box">
                    <p>Créé par : <?= $post->getUser()->getId() ?> - <?= $post->getUser()->getNickname() ?></p>
                    <p>Créé le <?= $post->getDateCreation() ?></p>
                    <p><?= $post->getContent() ?></p>
                    <?php if ((App\Session::getUser() && App\Session::getUser() == $post->getUser() || App\Session::isAdmin())) : ?>
                        <a href="index.php?ctrl=forum&action=deletePost&id=<?= $post->getId() ?>" class="delete-button" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?')">Supprimer</a>
                        <a href="index.php?ctrl=forum&action=updatePost&id=<?= $post->getId() ?>" class="update-button">Modifier</a>
                    <?php endif; ?>
                </div>
        <?php
            }
        } else {
            echo "<p>Pas de post dans ce topic</p>";
        }
        ?>
        <?php if (App\Session::getUser()) : ?>
            <form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method='POST' class="post-box">
                <label for="post">Message :</label><br>
                <textarea name="post" rows="4" placeholder="Entrez votre message" required></textarea><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        <?php endif; ?>
    </div>

    <div class="topic-box">
        <h3>Liste des posts du topic : <?= $topic->getTitle() ?></h3>
    </div>


</div>


<!-- faire un lien plutot qu'un form -->