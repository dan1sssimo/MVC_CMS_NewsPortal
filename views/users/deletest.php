<p>
    Ви дійсно бажаєте видалити історію <b><?= $lastStory['title'] ?></b>?
</p>
<p>
    <a href="/users/deletest?id=<?= $lastStory['id'] ?>&confirm=yes" class="btn btn-danger">Видалити</a>
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary">Відмінити</a>
</p>