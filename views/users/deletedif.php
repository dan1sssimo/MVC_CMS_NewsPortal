<p>
    Ви дійсно бажаєте видалити публікацію <b><?= $lastDiff['title'] ?></b>?
</p>
<p>
    <a href="/users/deletedif?id=<?= $lastDiff['id'] ?>&confirm=yes" class="btn btn-danger">Видалити</a>
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary">Відмінити</a>
</p>