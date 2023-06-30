<?php
$content = $result['data']['content'];
$postId = $_GET['id'];
?>

<div class="post-box-update">
    <form action="index.php?ctrl=forum&action=updatePost&id=<?= $postId ?>" method="post">
        <h2>Modifier votre message :</h2>
        <div>
            <textarea name="contentPost" rows="4" cols="60" required><?= $content ?></textarea>
        </div>
        <div>
            <input class="update-button" type="submit" value="Modifier" name="submit" />
        </div>
    </form>
</div>