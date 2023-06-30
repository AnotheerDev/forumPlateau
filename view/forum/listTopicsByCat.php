<?php
$category = $result["data"]['category'];
$topics = $result["data"]['topics'];
?>

<style>
    .container {
        display: grid;
        grid-template-columns: 1fr 300px;
        grid-gap: 20px;
    }

    .topic-box {
        width: 100%;
        background-color: #272729;
        border: 1px solid grey;
        border-radius: 4px;
        padding: 10px;
        color: white;
        margin-bottom: 10px;
        text-decoration: none;
    }

    .topic-box:hover {
        background-color: #535e72;
    }

    .topic-box-title {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .topic-box-info {
        font-size: 12px;
        color: #888;
    }

    .new-topic-form {
        margin-top: 20px;
        background-color: #272729;
        padding: 10px;
        border: 1px solid grey;
        border-radius: 4px;
    }

    .new-topic-form label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    .new-topic-form input[type="text"],
    .new-topic-form textarea {
        width: 100%;
        padding: 5px;
        margin-top: 5px;
        border: 1px solid grey;
        border-radius: 4px;
    }

    .new-topic-form input[type="submit"] {
        background-color: #0079d3;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    .new-topic-form input[type="submit"]:hover {
        background-color: #005fad;
    }

    .sidebar {
        background-color: #f5f5f5;
        padding: 10px;
        border: 1px solid grey;
        border-radius: 4px;
    }
</style>

<div class="container">
    <div class="topics-column">
        <h2>Liste topics de la catégorie <?= $category->getName() ?></h2>

        <?php
        if ($topics) {
            foreach ($topics as $topic) {
        ?>
                <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">
                    <div class="topic-box">
                        <div class="topic-box-title"><?= $topic->getTitle() ?></div>
                        <div class="topic-box-info">
                            <p>Créé le : <?= $topic->getDateCreation() ?></p>
                            <p>Créé par : <?= $topic->getMember()->getNickname() ?></p>
                        </div>
                    </div>
                </a>
        <?php
            }
        } else {
            echo "<h2>Pas de topic dans la catégorie</h2>";
        }
        ?>
    </div>

    <div>
        <div class="new-topic-form">
            <h2>Ajouter un nouveau topic</h2>

            <form action="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>" method="POST">
                <label for="title">Titre du topic :</label>
                <input type="text" name="title" id="title" placeholder="Entrez le titre du topic" required>

                <label for="post">Message :</label>
                <textarea name="post" id="post" rows="4" placeholder="Entrez votre message" required></textarea>

                <input type="submit" name="submit" value="Ajouter">
            </form>
        </div>
    </div>
</div>