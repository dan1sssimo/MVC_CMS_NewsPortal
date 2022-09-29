<?php
$UserModel = new \models\Users();
$user = $UserModel->GetCurrentUser();
?>
<!DOCTYPE html>
<hml>
    <head>
        <title><?= $MainTitle ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
        <link href="/style.css" type="text/css" rel="stylesheet"/>
        <link rel="icon" type="image/png" href="https://c.cksource.com/a/1/logos/ckeditor5.png">
    </head>
    <body id="backcolor">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="" style="color: red">main page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Головна сторінка</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <? if (!$UserModel->IsUserAuthenticated()): ?>
                        <a href="/users/register" class="btn btn-outline-primary ">Реєстрація</a>
                        <a href="/users/login" class="btn btn-primary">Увійти</a>
                    <? else: ?>
                        <ul class="nav nav-pills">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" href="#"
                                   role="button" aria-expanded="false">Login: <?= $user['login'] ?></a>
                                <ul class="dropdown-menu bg-dark ">
                                    <li><a class="nav-link text-light" href="/users/logout">Вийти</a></li>
                                </ul>
                            </li>
                        </ul>
                    <? endif; ?>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-5 char1"><?= $PageTitle ?></h1>
        <? if (!empty($MessageText)): ?>
            <div class="alert alert-<?= $MessageClass ?>" role="alert">
                <?= $MessageText ?>
            </div>
        <? endif; ?>
        <? ?>
        <?= $PageContent ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
</hml>