<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>
<form method="post">
    <h4>Пошук публікації:</h4>
    <input type="text" class="form-control" placeholder="Search..." aria-label="Search" name="search"
           value="<?php if (!empty($_POST['search'])): echo $_POST['search'];endif; ?>">
    <br>
    <button type="submit" class="btn btn-warning">Виконати пошук</button>
    <a href="/diff" class="btn btn-light">Відмінити пошук</a>
</form>
<?php for ($i = $page * $count; $i < ($page + 1) * $count; $i++): ?>
    <?php if (isset($lastDiff[$i])): ?>
        <div class="news-record textFam">
            <h4>Назва публікації: <?= $lastDiff[$i]['title'] ?></h4>
            <h6>Публікація додана: <?= $lastDiff[$i]['datetime'] ?></h6>
            <?php if ($lastDiff[$i]['datetime'] != $lastDiff[$i]['datetime_lastedit'] && $lastDiff[$i]['datetime_lastedit'] != null) : ?>
                <h6>Публікація відредагована: <?= $lastDiff[$i]['datetime_lastedit'] ?></h6>
            <? endif; ?>
            <div>
                <h6>Стислий опис публікації: </h6><?= $lastDiff[$i]['short_text'] ?>
            </div>
            <div class="news_butt">
                <a href="/diff/view?id=<?= $lastDiff[$i]['id'] ?>" class="btn btn-primary">Читати далі</a>
                <? if ($lastDiff[$i]['user_id'] == $user['id'] || $user['access'] == 1): ?>
                    <a href="/diff/edit?id=<?= $lastDiff[$i]['id'] ?>" class="btn btn-success">Редагувати</a>
                    <a href="/diff/delete?id=<?= $lastDiff[$i]['id'] ?>" class="btn btn-danger">Видалити</a>
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
                                         href="/diff/index?page=<?php echo $i ?>"><?php echo $i + 1 ?></a>
                </li>
            <?php endfor; ?>
        <?php endif; ?>
    </ul>
</nav>
