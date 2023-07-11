<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>

<h1>Le super blog de l'AVBN !</h1>
<p class="center">Derniers billets du blog :</p>

<?php
foreach ($posts as $post) {
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post->title); ?>
            <em>le <?= $post->frenchCreationDate ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($post->content)); ?>
            <br />
            <!-- on modifie notre lien pour qu'il prenne en paramètre un billet précis -->
            <em><a href="index.php?action=post&id=<?= urlencode($post->identifier) ?>">Commentaires</a></em>
        </p>
    </div>
<?php
} // The end of the posts loop.
?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>