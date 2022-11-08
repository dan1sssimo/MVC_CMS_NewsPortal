<?php
$UserModel = new \models\Users();
$user = $UserModel->GetCurrentUser();
?>
    <table class="table table-bordered border-primary ">
        <thead>
        <tr class="table-info">
            <th scope="col">Логін</th>
            <th scope="col">Прізвище</th>
            <th scope="col">Ім'я</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-info">
            <td><?= $user['login'] ?></td>
            <td><?= $user['lastname'] ?></td>
            <td><?= $user['firstname'] ?></td>
        </tr>
        </tbody>
    </table>
    <div class="char1">
        <a href="editName" class="btn btn-info"><h5>Змінити особисті дані</h5></a>
        <a href="editPass" class="btn btn-info"><h5>Змінити пароль</h5></a>
        <?php if ($user['access'] != 1): ?>
            <a href="/admin" class="btn btn-danger"><h5>Режим адміністратора</h5></a>
        <?php endif; ?>
        <?php if ($user['access'] != 0): ?>
            <a href="exitadmin" class="btn btn-danger"><h5>Вийти з режиму адміністратора</h5></a>
        <?php endif; ?>
    </div>
    <h6 style="text-align: center; font-size: 35px; padding-top: 25px">Статистика користувача</h6>
    <div>
        <table class="table table-bordered border-primary " style="padding-top: 50px">
            <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Назва статистики</th>
                <th scope="col">Кількість</th>
            </tr>
            </thead>
            <tbody>
            <tr class="table-info">
                <th scope="row">1</th>
                <td>Опубліковано новин користувачем <b><?= $user['firstname'] ?></b></td>
                <td><?= $counterNewsByUser[0] ?></td>
            </tr>
            <tr class="table-info">
                <th scope="row">2</th>
                <td>Опубліковано історій користувачем <b><?= $user['firstname'] ?></b></td>
                <td><?= $counterStoryByUser[0] ?></td>
            </tr>
            <tr class="table-info">
                <th scope="row">3</th>
                <td>Опубліковано публікацій користувачем <b><?= $user['firstname'] ?></b></td>
                <td><?= $counterDiffByUser[0] ?></td>
            </tr>
            <tr class="table-info">
                <th scope="row">4</th>
                <td>Написано коментарів користувачем <b><?= $user['firstname'] ?></b></td>
                <td><?= $counterCommentsByUser[0] ?></td>
            </tr>
            <tr class="table-info">
                <th scope="row">5</th>
                <td>Поставлено лайків користувачем <b><?= $user['firstname'] ?></b></td>
                <td><?= $counterLikesByUser[0] ?></td>
            </tr>
            </tbody>
        </table>
        <div style="text-align: center">
            <?php if ($user['access'] != 0): ?>
                <a href="deleteUser" class="btn btn-danger"><h6>Видалення користувачів</h6></a>
                <a href="deleteNews" class="btn btn-danger"><h6>Видалення новин</h6></a>
                <a href="deleteStory" class="btn btn-danger"><h6>Видалення історій</h6></a>
                <a href="deleteDiff" class="btn btn-danger"><h6>Видалення публікацій</h6></a>
                <a href="deleteComments" class="btn btn-danger"><h6>Видалення коментарів</h6></a>
                <a href="deleteLikes" class="btn btn-danger"><h6>Анулювання лайків</h6></a>
            <?php endif; ?>
        </div>
    </div>
<?php if ($user['access'] != 0): ?>
    <h6 style="text-align: center; font-size: 35px; padding-top: 25px">Загальна статистика сайту</h6>
    <div>
    <table class="table table-bordered border-primary " style="padding-top: 50px">
        <thead>
        <tr class="table-info">
            <th scope="col">#</th>
            <th scope="col">Назва статистики</th>
            <th scope="col">Кількість</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-info">
            <th scope="row">1</th>
            <td>Опубліковано новин</td>
            <td><?= $counterNews[0] ?></td>
        </tr>
        <tr class="table-info">
            <th scope="row">2</th>
            <td>Опубліковано історій</td>
            <td><?= $counterStory[0] ?></td>
        </tr>
        <tr class="table-info">
            <th scope="row">3</th>
            <td>Опубліковано публікацій</td>
            <td><?= $counterDiff[0] ?></td>
        </tr>
        <tr class="table-info">
            <th scope="row">4</th>
            <td>Написано коментарів</td>
            <td><?= $counterComments[0] ?></td>
        </tr>
        <tr class="table-info">
            <th scope="row">5</th>
            <td>Поставлено лайків</td>
            <td><?= $counterLikes[0] ?></td>
        </tr>
        <tr class="table-info">
            <th scope="row">6</th>
            <td>Зареєстровано користувачів</td>
            <td><?= $counterUsers[0] ?></td>
        </tr>
        </tbody>
    </table>
<?php endif; ?>