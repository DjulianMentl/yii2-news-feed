<?php

namespace app\controllers;

use app\components\events\ShowNewsEvent;
use app\services\NewsServiceInterface;
use yii\web\Controller;
use yii\web\Request;

class NewsController extends Controller
{
    public const EVENT_SHOW_NEWS = 'showNews';

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

        if (!$request->getCookies()->has('counter_' . $id)) {
            $this->trigger(self::EVENT_SHOW_NEWS, new ShowNewsEvent(['news' => $news]));
        }

        return $this->render('details', ['model' => $news,]);
    }
}