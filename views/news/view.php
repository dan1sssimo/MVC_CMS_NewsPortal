<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>
<div class="news">
    <div>
        <? if (is_file('files/news/' . $model['photo'] . '_m.jpg')): ?>
            <? if (is_file('files/news/' . $model['photo'] . '_m.jpg')): ?>
                <a href="/files/news/<?= $model['photo'] ?>_b.jpg"  target="_blank" >
            <? endif; ?>
            <img class="bd-placeholder-img rounded float-start "
                 src="/files/news/<?= $model['photo'] ?>_m.jpg"/>
            <? if (is_file('files/news/' . $model['photo'] . '_m.jpg')): ?>
                </a>
            <? endif; ?>
        <? endif; ?>
    </div>
    <div>
        <h3> <?= ($model['text']) ?></h3>
    </div>
</div>
<div>
    <h5 class="char1">Новина додана: <?= $model['datetime'] ?></h5>
    <h5 style="color: coral; text-align: center">Лайки новини: <?= $counter[0] ?></h5>
</div>
<h3 style="padding-left: 45%">Коментарі</h3>
<div style="color: darkslategrey;">
    <?php for ($i = $page * $count; $i < ($page + 1) * $count; $i++): ?>
        <?php if (isset($lastComments[$i])): ?>
            <h4>Користувач: <?= $lastComments[$i]['firstname'] ?></h4>
            <h5>Коментар: <?= $lastComments[$i]['text'] ?></h5>
            <h6>Коментар доданий: <?= $lastComments[$i]['datetime'] ?></h6>
            <? if ($lastComments[$i]['user_id'] == $user['id'] || $user['access'] == 1): ?>
                <a href="deletecomment?id=<?= $lastComments[$i]['id'] ?>" class="btn btn-danger">Видалити</a>
            <?php endif ?>
        <?php endif ?>
    <?php endfor ?>
</div>
<nav aria-label="Page navigation example" style="text-align: center">
    <ul class="pagination">
        <?php if (isset($page)): ?>
            <?php for ($i = 0; $i <= $pageCount; $i++): ?>
                <li class="page-item"><a class="page-link" style="color: black"
                                         href="/news/view?id=<?= $model['id'] ?>&page=<?php echo $i ?>"><?php echo $i + 1 ?></a>
                </li>
            <?php endfor; ?>
        <?php endif; ?>
    </ul>
</nav>
<h1 class="char1"><a href="/site" class="btn btn-info">Повернутися на головну сторінку</a></h1>
