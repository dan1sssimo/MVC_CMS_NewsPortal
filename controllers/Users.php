<?php

namespace controllers;

use core\Controller;

class Users extends Controller
{
    protected $usersModel;
    protected $newsModel;
    protected $storyModel;
    protected $diffModel;

    function __construct()
    {
        $this->usersModel = new \models\Users();
        $this->newsModel = new \models\News();
        $this->storyModel = new \models\Story();
        $this->diffModel = new \models\Diff();
    }

    public
    function actionDelete()
    {
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $title = 'Видалення користувача';
            $id = $_GET['id'];
            if ($this->usersModel->GetCurrentUser()['id'] == $id)
                return $this->renderMessage('error', 'Помилка видалення користувача', null,
                    [
                        'PageTitle' => $title,
                        'MainTitle' => $title,]);
            if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
                if ($this->usersModel->DeleteUser($id))
                    header('Location: /users/deleteUser');
                else {
                    return $this->renderMessage('error', 'Помилка видалення користувача', null,
                        [
                            'PageTitle' => $title,
                            'MainTitle' => $title,]);
                }
            }
            $user1 = $this->usersModel->GetUserById($id);
            return $this->render('delete', ['lastUsers' => $user1], [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ]);
        }
    }

    public
    function actionDeleteNew()
    {
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $title = 'Видалення новини';
            $id = $_GET['id'];
            if ($this->usersModel->GetCurrentUser()['id'] == $id)
                return $this->renderMessage('error', 'Помилка видалення новини', null,
                    [
                        'PageTitle' => $title,
                        'MainTitle' => $title,]);
            if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
                if ($this->newsModel->DeleteNews($id))
                    header('Location: /users/deleteNews');
                else {
                    return $this->renderMessage('error', 'Помилка видалення новини', null,
                        [
                            'PageTitle' => $title,
                            'MainTitle' => $title,]);
                }
            }
            $news = $this->newsModel->GetNewsById($id);
            return $this->render('deletenew', ['lastNews' => $news], [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ]);
        }
    }

    public
    function actionDeleteSt()
    {
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $title = 'Видалення історії';
            $id = $_GET['id'];
            if ($this->usersModel->GetCurrentUser()['id'] == $id)
                return $this->renderMessage('error', 'Помилка видалення історії', null,
                    [
                        'PageTitle' => $title,
                        'MainTitle' => $title,]);
            if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
                if ($this->storyModel->DeleteStory($id))
                    header('Location: /users/deleteStory');
                else {
                    return $this->renderMessage('error', 'Помилка видалення історії', null,
                        [
                            'PageTitle' => $title,
                            'MainTitle' => $title,]);
                }
            }
            $story = $this->storyModel->GetStoryById($id);
            return $this->render('deletest', ['lastStory' => $story], [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ]);
        }
    }

    public
    function actionDeleteDif()
    {
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $title = 'Видалення публікації';
            $id = $_GET['id'];
            if ($this->usersModel->GetCurrentUser()['id'] == $id)
                return $this->renderMessage('error', 'Помилка видалення публікації', null,
                    [
                        'PageTitle' => $title,
                        'MainTitle' => $title,]);
            if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
                if ($this->diffModel->DeleteDiff($id))
                    header('Location: /users/deleteDiff');
                else {
                    return $this->renderMessage('error', 'Помилка видалення публікації', null,
                        [
                            'PageTitle' => $title,
                            'MainTitle' => $title,]);
                }
            }
            $diff = $this->diffModel->GetDiffById($id);
            return $this->render('deletedif', ['lastDiff' => $diff], [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ]);
        }
    }

    public function actionDeleteDiff()
    {
        if (empty($_GET['page']))
            $page = 0;
        else
            $page = $_GET['page'];
        $count = 4;
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $allDiff = $this->diffModel->GetAllDiff();
            $title = 'Видалення публікації';
            $pageCount = floor(count($allDiff) / $count);
            if (!isset($_SESSION['user']))
                return $this->renderMessage('error', 'Ви не увійшли на сайт.', null);
            $params = [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ];
            return $this->render('deleteDiff', ['allDiff' => $allDiff, 'pageCount' => $pageCount,
                'page' => $page, 'count' => $count], $params);
        }
    }

    public function actionDeleteLikes()
    {
        if (empty($_GET['page']))
            $page = 0;
        else
            $page = $_GET['page'];
        $count = 4;
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $allNews = $this->newsModel->GetAllNews();
            $pageCount = floor(count($allNews) / $count);
            $title = 'Анулювання лайків';
            if (!isset($_SESSION['user']))
                return $this->renderMessage('error', 'Ви не увійшли на сайт.', null);
            $params = [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ];
            return $this->render('deleteLikes', ['allNews' => $allNews, 'pageCount' => $pageCount,
                'page' => $page, 'count' => $count], $params);
        }
    }

    public
    function actionDeleteLike()
    {
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $title = 'Анулювання лайків';
            $id = $_GET['id'];
            if ($this->usersModel->GetCurrentUser()['id'] == $id)
                return $this->renderMessage('error', 'Помилка анулювання', null,
                    [
                        'PageTitle' => $title,
                        'MainTitle' => $title,]);
            if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
                if ($this->newsModel->DeleteLikes($id))
                    header('Location: /users/deleteLikes');
                else {
                    return $this->renderMessage('error', 'Помилка видалення анулювання', null,
                        [
                            'PageTitle' => $title,
                            'MainTitle' => $title,]);
                }
            }
            $news = $this->newsModel->GetNewsById($id);
            return $this->render('deletelike', ['lastNews' => $news], [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ]);
        }
    }

    public function actionDeleteStory()
    {
        if (empty($_GET['page']))
            $page = 0;
        else
            $page = $_GET['page'];
        $count = 4;
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $allStory = $this->storyModel->GetAllStory();
            $title = 'Видалення історії';
            $pageCount = floor(count($allStory) / $count);
            if (!isset($_SESSION['user']))
                return $this->renderMessage('error', 'Ви не увійшли на сайт.', null);
            $params = [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ];
            return $this->render('deleteStory', ['allStory' => $allStory, 'pageCount' => $pageCount,
                'page' => $page, 'count' => $count], $params);
        }
    }

    public function actionDeleteNews()
    {
        if (empty($_GET['page']))
            $page = 0;
        else
            $page = $_GET['page'];
        $count = 4;
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $allNews = $this->newsModel->GetAllNews();
            $title = 'Видалення новин';
            $pageCount = floor(count($allNews) / $count);
            if (!isset($_SESSION['user']))
                return $this->renderMessage('error', 'Ви не увійшли на сайт.', null);
            $params = [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ];
            return $this->render('deleteNews', ['allNews' => $allNews, 'pageCount' => $pageCount,
                'page' => $page, 'count' => $count], $params);
        }
    }

    public function actionDeleteComments()
    {
        if (empty($_GET['page']))
            $page = 0;
        else
            $page = $_GET['page'];
        $count = 4;
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $allComments = $this->newsModel->GetAllComments();
            $pageCount = floor(count($allComments) / $count);
            $title = 'Видалення коментарів';
            if (!isset($_SESSION['user']))
                return $this->renderMessage('error', 'Ви не увійшли на сайт.', null);
            $params = [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ];
            return $this->render('deleteComments', ['allComments' => $allComments, 'pageCount' => $pageCount,
                'page' => $page, 'count' => $count], $params);
        }
    }

    public
    function actionDeleteCom()
    {
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $title = 'Видалення коментаря';
            $id = $_GET['id'];
            if ($this->usersModel->GetCurrentUser()['id'] == $id)
                return $this->renderMessage('error', 'Помилка видалення коментаря', null,
                    [
                        'PageTitle' => $title,
                        'MainTitle' => $title,]);
            if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
                if ($this->newsModel->DeleteComment($id))
                    header('Location: /users/deleteComments');
                else {
                    return $this->renderMessage('error', 'Помилка видалення коментаря', null,
                        [
                            'PageTitle' => $title,
                            'MainTitle' => $title,]);
                }
            }
            $comment = $this->newsModel->GetCommentById($id);
            return $this->render('deletecom', ['lastComment' => $comment], [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ]);
        }
    }

    public function actionDeleteUser()
    {
        if (empty($_GET['page']))
            $page = 0;
        else
            $page = $_GET['page'];
        $count = 4;
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else {
            $user1 = $this->usersModel->GetUsers();
            $pageCount = floor(count($user1) / $count);
            $title = 'Видалення користувачів';
            if (!isset($_SESSION['user']))
                return $this->renderMessage('error', 'Ви не увійшли на сайт.', null);
            $params = [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ];
            return $this->render('deleteUser', ['lastUsers' => $user1, 'pageCount' => $pageCount,
                'page' => $page, 'count' => $count], $params);
        }
    }

    public function actionExitAdmin()
    {
        if ($this->usersModel->GetCurrentUser()['access'] != 1)
            return $this->renderMessage('error', 'Помилка доступу.', null);
        else
            if (!isset($_SESSION['user']))
                return $this->renderMessage('error', 'Ви не увійшли на сайт.', null);
            else {
                $title = 'Вихід з адмінки';
                if ($this->isPost()) {
                    $login = $this->usersModel->GetCurrentUser()['login'];
                    $result = $this->usersModel->ExitAdm($_POST, $login);
                    if ($result === true) {
                        {
                            unset($_SESSION['user']);
                            return $this->renderMessage('ok', 'Ви успішно вийшли з адмінки', null, [
                                    'PageTitle' => $title,
                                    'MainTitle' => $title,
                                ]
                            );
                        }
                    }
                } else {
                    $params = [
                        'PageTitle' => $title,
                        'MainTitle' => $title,
                    ];
                    return $this->render('exitAdmin', null, $params);
                }
            }
    }

    public function actionEdit()
    {
        $counterNewsByUser = $this->usersModel->GetAllNewsByUser();
        $counterStoryByUser = $this->usersModel->GetAllStoryByUser();
        $counterDiffByUser = $this->usersModel->GetAllDiffByUser();
        $counterLikesByUser = $this->usersModel->GetAllLikesByUser();
        $counterCommentsByUser = $this->usersModel->GetAllCommentsByUser();

        $counterNews = $this->usersModel->GetAllNews();
        $counterStory = $this->usersModel->GetAllStory();
        $counterDiff = $this->usersModel->GetAllDiff();
        $counterLikes = $this->usersModel->GetAllLikes();
        $counterComments = $this->usersModel->GetAllComments();
        $counterUsers = $this->usersModel->GetAllUsers();
        $title = 'Особистий кабінет';
        if (!isset($_SESSION['user']))
            return $this->renderMessage('error', 'Ви не увійшли на сайт.', null);
        $params = [
            'PageTitle' => $title,
            'MainTitle' => $title,
        ];
        return $this->render('edit', ['counterNewsByUser' => $counterNewsByUser, 'counterStoryByUser' => $counterStoryByUser,
            'counterDiffByUser' => $counterDiffByUser, 'counterLikesByUser' => $counterLikesByUser,
            'counterCommentsByUser' => $counterCommentsByUser, 'counterNews' => $counterNews, 'counterStory' => $counterStory,
            'counterDiff' => $counterDiff, 'counterLikes' => $counterLikes, 'counterComments' => $counterComments, 'counterUsers' => $counterUsers], $params);
    }

    public function actionEditPass()
    {
        if (!isset($_SESSION['user']))
            return $this->renderMessage('error', 'Ви не увійшли на сайт.', null);
        else {
            $title = 'Зміна пароля';
            if ($this->isPost()) {
                $login = $this->usersModel->GetCurrentUser()['login'];
                $result = $this->usersModel->ChangePassword($_POST, $login);
                if ($result === true) {
                    {
                        unset($_SESSION['user']);
                        return $this->renderMessage('ok', 'Дані змінено, увійдіть в аккаунт ще раз', null, [
                                'PageTitle' => $title,
                                'MainTitle' => $title,
                            ]
                        );
                    }
                } else {
                    $message = implode('<br/>', $result);
                    return $this->render('editPass', null, [
                        'PageTitle' => $title,
                        'MainTitle' => $title,
                        'MessageText' => $message,
                        'MessageClass' => 'danger'
                    ]);
                }
            } else {
                $params = [
                    'PageTitle' => $title,
                    'MainTitle' => $title,
                ];
                return $this->render('editPass', null, $params);
            }
        }
    }

    public function actionEditName()
    {
        if (!isset($_SESSION['user']))
            return $this->renderMessage('error', 'Ви не увійшли на сайт.', null);
        else {
            $title = 'Зміна особистих даних';
            if ($this->isPost()) {
                $login = $this->usersModel->GetCurrentUser()['login'];
                $result = $this->usersModel->ChangeName($_POST, $login);
                if ($result === true) {
                    {
                        unset($_SESSION['user']);
                        return $this->renderMessage('ok', 'Дані змінено, увійдіть в аккаунт ще раз', null, [
                                'PageTitle' => $title,
                                'MainTitle' => $title,
                            ]
                        );
                    }
                } else {
                    $message = implode('<br/>', $result);
                    return $this->render('editName', null, [
                        'PageTitle' => $title,
                        'MainTitle' => $title,
                        'MessageText' => $message,
                        'MessageClass' => 'danger'
                    ]);
                }
            } else {
                $params = [
                    'PageTitle' => $title,
                    'MainTitle' => $title,
                ];
                return $this->render('editName', null, $params);
            }
        }
    }

    public function actionLogout()
    {
        $title = 'Вихід з сайту';
        unset($_SESSION['user']);
        return $this->renderMessage('ok', 'Ви вийшли з Вашого аккаунту.', null, [
            'PageTitle' => $title,
            'MainTitle' => $title,]);
    }

    public function actionLogin()
    {
        $title = 'Вхід на сайт';
        if (isset($_SESSION['user']))
            return $this->renderMessage('ok', 'Ви вже увійшли на сайт.', null);
        if ($this->isPost()) {
            $user = $this->usersModel->AuthUser($_POST['login'], $_POST['password']);
            if (!empty($user)) {
                $_SESSION['user'] = $user;
                return $this->renderMessage('ok', 'Ви успішно увійшли на сайт', null, [
                    'PageTitle' => $title,
                    'MainTitle' => $title,]);
            } else {
                return $this->render('login', null, [
                    'PageTitle' => $title,
                    'MainTitle' => $title,
                    'MessageText' => 'Неправильний логін або пароль',
                    'MessageClass' => 'danger'
                ]);
            }
        } else {
            $params = [
                'PageTitle' => $title,
                'MainTitle' => $title,
            ];
            return $this->render('login', null, $params);
        }
    }

    public function actionRegister()
    {
        if ($this->isPost()) {

            $result = $this->usersModel->AddUser($_POST);
            if ($result === true) {
                {
                    return $this->renderMessage('ok', 'Користувач успішно зареєстрований!', null, [
                            'PageTitle' => 'Реєстрація на сайті',
                            'MainTitle' => 'Реєстрація на сайті',
                        ]
                    );
                }
            } else {
                $message = implode('<br/>', $result);
                return $this->render('register', null, [
                    'PageTitle' => 'Реєстрація на сайті',
                    'MainTitle' => 'Реєстрація на сайті',
                    'MessageText' => $message,
                    'MessageClass' => 'danger'
                ]);
            }
        } else {
            $params = [
                'PageTitle' => 'Реєстрація на сайті',
                'MainTitle' => 'Реєстрація на сайті',
            ];
            return $this->render('register', null, $params);
        }
    }
}