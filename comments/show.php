<?php include __DIR__ . '/../header.php'; ?>
<h1>
    <?= $article->getName() ?>
</h1>
<p>
    <?= $article->getText() ?>
</p>
<?php
$pattern = '~comments/(\d+)~';
preg_match($pattern, $_GET['route'], $matches);
?>
<?php foreach ($comments as $comment): ?>
    <?php if ($comment->getArticleId() == $matches[1]): ?>
        <p>
            Комментарий:
            <?= $comment->getText() ?>
        <form action="/project/www/comments/edit/<?= $comment->getId(); ?>" method="post">
            <label><input type="text" name="text" value="<?= $comment->getText() ?>"></label>

            <a href="/project/www/comments/delete/<?= $comment->getId(); ?>">Delete</a>
            <br><br>

            <input type="submit" value="Редактировать">
        </form>
        </p>
    <?php endif; ?>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.html'; ?>