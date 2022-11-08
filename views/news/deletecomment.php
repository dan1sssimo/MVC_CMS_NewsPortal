<p>
    Ви дійсно бажаєте видалити коментар <b><?= $model['text'] ?></b>?
</p>
<p>
    <a href="/news/deletecomment?id=<?= $model['id'] ?>&confirm=yes" class="btn btn-danger">Видалити</a>
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary">Відмінити</a>
</p>
