<p>
    Ви дійсно бажаєте видалити коментар <b><?= $lastComment['text'] ?></b>?
</p>
<p>
    <a href="/users/deletecom?id=<?= $lastComment['id'] ?>&confirm=yes" class="btn btn-danger">Видалити</a>
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary">Відмінити</a>
</p>