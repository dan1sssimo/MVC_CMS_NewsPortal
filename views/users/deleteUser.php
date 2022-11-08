<?php for ($i = $page * $count; $i < ($page + 1) * $count; $i++): ?>
    <?php if (isset($lastUsers[$i])): ?>
        <h4 class="char1">Ім'я користувача: <?= $lastUsers[$i]['login'] ?></h4>
        <h6 class="char1"><a href="/users/delete?id=<?= $lastUsers[$i]['id'] ?>" class="btn btn-danger">Видалити</a>
        </h6>
    <?php endif ?>
<?php endfor ?>
<nav aria-label="Page navigation example" style="text-align: center">
    <ul class="pagination">
        <?php if (isset($page)): ?>
            <?php for ($i = 0; $i <= $pageCount; $i++): ?>
                <li class="page-item"><a class="page-link" style="color: black"
                                         href="/users/deleteUser?page=<?php echo $i ?>"><?php echo $i + 1 ?></a>
                </li>
            <?php endfor; ?>
        <?php endif; ?>
    </ul>
</nav>

