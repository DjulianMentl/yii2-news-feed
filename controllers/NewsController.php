<?php

namespace app\controllers;

use app\services\NewsServiceInterface;
use yii\web\Controller;
use yii\web\Request;

class NewsController extends Controller
{
    private NewsServiceInterface $news;

    public function __construct($id, $module, NewsServiceInterface $news, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->news = $news;
    }


    public function actionIndex(): string
    {
        return $this->render('index', $this->news->getAll());
    }


    public function actionShow(Request $request, int $id): string
    {
        $news = $this->news->show($id);


        if ($request->getCookies()->has('counter_' . $id)) {

        }

        $cookies = $request->cookies;
        if ($cookies->get('counter_' . $id) === null) {

        }

        return $this->render('details', ['model' => $news,]);
    }
}