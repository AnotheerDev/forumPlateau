<?php

$topics = $result["data"]['topics'];
// var_dump($topics);
// die;
?>

<h1>liste topics</h1>

<?php
foreach ($topics as $topic) {

?>
    <p><?= $topic->getTitle() ?></p>
<?php
}
