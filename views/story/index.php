<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>
<form method="post">
    <h4>Пошук історії:</h4>
    <input type="text" class="form-control" placeholder="Search..." aria-label="Search" name="search"
           value="<?php if (!empty($_POST['search'])): echo $_POST['search'];endif; ?>">
    <br>
    <button type="submit" class="btn btn-warning">Виконати пошук</button>
    <a href="/story" class="btn btn-light">Відмінити пошук</a>
</form>
<?php for ($i = $page * $count; $i < ($page + 1) * $count; $i++): ?>
    <?php if (isset($lastStory[$i])): ?>
        <div class="news-record textFam">
            <h4>Назва історії: <?= $lastStory[$i]['title'] ?></h4>
            <h6>Історія додана: <?= $lastStory[$i]['datetime'] ?></h6>
            <?php if ($lastStory[$i]['datetime'] != $lastStory[$i]['datetime_lastedit'] && $lastStory[$i]['datetime_lastedit'] != null) : ?>
                <h6>Історія відредагована: <?= $lastStory[$i]['datetime_lastedit'] ?></h6>
            <? endif; ?>
            <div>
                <h6>Стислий опис історії: </h6><?= $lastStory[$i]['short_text'] ?>
            </div>
            <div class="news_butt">
                <a href="/story/view?id=<?= $lastStory[$i]['id'] ?>" class="btn btn-primary">Читати далі</a>
                <? if ($lastStory[$i]['user_id'] == $user['id'] || $user['access'] == 1): ?>
                    <a href="/story/edit?id=<?= $lastStory[$i]['id'] ?>" class="btn btn-success">Редагувати</a>
                    <a href="/story/delete?id=<?= $lastStory[$i]['id'] ?>" class="btn btn-danger">Видалити</a>
                <? endif; ?>
            </div>
        </div>
    <?php endif ?>
<?php endfor ?>
<nav aria-label="Page navigation example" style="text-align: center">
    <ul class="pagination">
        <?php if (isset($page)): ?>
            <?php for ($i = 0; $i <= $pageCount; $i++): ?>
                <li class="page-item"><a class="page-link" style="color: black"
                                         href="/story/index?page=<?php echo $i ?>"><?php echo $i + 1 ?></a>
                </li>
            <?php endfor; ?>
        <?php endif; ?>
    </ul>
</nav>

