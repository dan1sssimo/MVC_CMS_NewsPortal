<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>
<form method="post">
    <h4>Пошук новини:</h4>
    <input type="text" class="form-control" placeholder="Search..." aria-label="Search" name="search"
           value="<?php if (!empty($_POST['search'])): echo $_POST['search'];endif; ?>">
    <br>
    <button type="submit" class="btn btn-warning">Виконати пошук</button>
    <a href="/news" class="btn btn-light">Відмінити пошук</a>
</form>
<?php for ($i = $page * $count; $i < ($page + 1) * $count; $i++): ?>
    <?php if (isset($lastNews[$i])): ?>
        <div class="news-record textFam">
            <h4>Назва новини: <?= $lastNews[$i]['title'] ?></h4>
            <h6>Новина додана: <?= $lastNews[$i]['datetime'] ?></h6>
            <?php if ($lastNews[$i]['datetime'] != $lastNews[$i]['datetime_lastedit'] && $lastNews[$i]['datetime_lastedit'] != null) : ?>
                <h6>Новина відредагована: <?= $lastNews[$i]['datetime_lastedit'] ?></h6>
            <? endif; ?>
            <div class="photo">
                <? if (is_file('files/news/' . $lastNews[$i]['photo'] . '_s.jpg')): ?>
                    <img class="bd-placeholder-img img-thumbnail float-start"
                         src="/files/news/<?= $lastNews[$i]['photo'] ?>_s.jpg"/>
                <? else: ?>
                    <svg class="bd-placeholder-img img-thumbnail float-start" width="200" height="200"
                         xmlns="http://www.w3.org/2000/svg" role="img"
                         preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#868e96"></rect>
                    </svg>
                <? endif; ?>
            </div>
            <div class="news_butt">
                <a href="/news/view?id=<?= $lastNews[$i]['id'] ?>" class="btn btn-primary">Читати далі</a>
                <? if ($lastNews[$i]['user_id'] == $user['id'] || $user['access'] == 1): ?>
                    <a href="/news/edit?id=<?= $lastNews[$i]['id'] ?>" class="btn btn-success">Редагувати</a>
                    <a href="/news/delete?id=<?= $lastNews[$i]['id'] ?>" class="btn btn-danger">Видалити</a>
                <? endif; ?>
                    <a href="/news/addcomment?id=<?= $lastNews[$i]['id'] ?>" class="btn btn-warning">Додати коментар</a>
                    <a href="/news/addlike?id=<?= $lastNews[$i]['id'] ?>" class="btn btn-success">Лайк</a>
            </div>
            <div>
                <h6>Стислий опис новини: </h6><?= $lastNews[$i]['short_text'] ?>
            </div>
        </div>
    <?php endif ?>
<?php endfor ?>

<nav aria-label="Page navigation example" >
    <ul class="pagination">
        <?php if (isset($page)): ?>
            <?php for ($i = 0; $i <= $pageCount; $i++): ?>
                <li class="page-item"><a class="page-link" style="color: black"
                                         href="/news/index?page=<?php echo $i ?>"><?php echo $i + 1 ?></a>
                </li>
            <?php endfor; ?>
        <?php endif; ?>
    </ul>
</nav>
