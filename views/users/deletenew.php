<p>
    Ви дійсно бажаєте видалити новину <b><?= $lastNews['title'] ?></b>?
</p>
<p>
    <a href="/users/deletenew?id=<?= $lastNews['id'] ?>&confirm=yes" class="btn btn-danger">Видалити</a>
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary">Відмінити</a>
</p>