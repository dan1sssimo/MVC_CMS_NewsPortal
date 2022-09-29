<?php

namespace controllers;

use core\Controller;

class  News extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', ['count' => 10], ['MainTitle' => 'Новини',
            'PageTitle' => 'Новини']);
    }

    public function actionList()
    {
        echo 'actionList';
    }
}