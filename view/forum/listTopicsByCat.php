<?php
$category = $result["data"]['category'];
$topics = $result["data"]['topics'];
?>



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
                            <p>Créé par : <?= $topic->getUser()->getNickname() ?></p>
                            <?php if ((App\Session::getUser() && App\Session::getUser() == $topic->getUser() || App\Session::isAdmin())) : ?>
                                <?php if ($topic && $topic->getLocked()) : ?>
                                    <a href="index.php?ctrl=forum&action=changeStatusTopic&id=<?= $topic->getId() ?>" class="update-button" onclick="return confirm('Êtes-vous sûr de vouloir déverrouiller ce topic ?')">Unlock</a>
                                <?php else : ?>
                                    <a href="index.php?ctrl=forum&action=changeStatusTopic&id=<?= $topic->getId() ?>" class="delete-button" onclick="return confirm('Êtes-vous sûr de vouloir verrouiller ce topic ?')">Lock</a>
                                <?php endif; ?>
                            <?php endif; ?>
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

    <?php if (App\Session::getUser() && App\Session::getUser()->getId()) : ?>
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
    <?php endif; ?>


</div>