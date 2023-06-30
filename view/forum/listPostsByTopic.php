<?php
$topic = $result["data"]["topic"];
$posts = $result["data"]["posts"];
// $member = $result["data"]["member"];
?>
<style>
    .container {
        display: grid;
        grid-template-columns: 1fr 300px;
        grid-gap: 20px;
    }

    .topic-box {
        background-color: #272729;
        border: 1px solid #ddd;
        border-radius: 5px;
        border-color: #888;
        padding: 10px;
        max-height: 300px;
    }

    .post-box {
        background-color: #272729;
        border: 1px solid #ddd;
        border-radius: 5px;
        border-color: #888;
        padding: 10px;
        margin-bottom: 10px;
    }

    .post-box p {
        margin: 0;
    }

    .post-box p:first-child {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .post-box p:nth-child(2) {
        color: #888;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .post-box p:nth-child(3) {
        margin-bottom: 10px;
    }

    .post-box textarea {
        width: 100%;
        height: 100px;
        margin-bottom: 10px;
    }

    .post-box input[type="submit"] {
        background-color: #0079d3;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .post-box input[type="submit"]:hover {
        background-color: #005fad;
    }
</style>

<div class="container">
    <div class="posts-column">
        <?php
        if ($posts) {
            foreach ($posts as $post) {
                // var_dump($post);
        ?>
                <div class="post-box">
                    <p>Créé par : <?= $post->getMember()->getId() ?> - <?= $post->getMember()->getNickname() ?></p>
                    <p>Créé le <?= $post->getDateCreation() ?></p>
                    <p><?= $post->getContent() ?></p>
                </div>
        <?php
            }
        } else {
            echo "<p>Pas de post dans ce topic</p>";
        }
        ?>

        <form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method='POST' class="post-box">
            <label for="post">Message :</label><br>
            <textarea name="post" rows="4" placeholder="Entrez votre message" required></textarea><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <div class="topic-box">
        <h3>Liste des posts du topic : <?= $topic->getTitle() ?></h3>
    </div>
</div>