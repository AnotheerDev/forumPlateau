<?php

$topics = $result["data"]['topics'];

?>

<h2>Liste des topics</h2>

<ul class="topic-list">
    <?php foreach ($topics as $topic) {
        // var_dump($topic->getLocked());
    ?>
        <li class="topic-list-item">
            <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">
                <div class="topic-box">
                    <div class="topic-box-title"><?= $topic->getTitle() ?></div>
                    <div class="topic-box-info"><?= $topic->getdateCreation() ?></div>
                    <?php if ((App\Session::getUser() && App\Session::getUser() == $topic->getUser() || App\Session::isAdmin())) : ?>
                        <a href="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>" class="delete-button" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce topic ?')">Supprimer</a>
                        <?php if ($topic && $topic->getLocked()) : ?>
                            <a href="index.php?ctrl=forum&action=changeStatusTopic&id=<?= $topic->getId() ?>" class="update-button" onclick="return confirm('Êtes-vous sûr de vouloir déverrouiller ce topic ?')">Unlock</a>
                        <?php else : ?>
                            <a href="index.php?ctrl=forum&action=changeStatusTopic&id=<?= $topic->getId() ?>" class="delete-button" onclick="return confirm('Êtes-vous sûr de vouloir verrouiller ce topic ?')">Lock</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </a>
        </li>
    <?php } ?>
</ul