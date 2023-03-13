<?php

namespace app\controllers\admin;

use app\models\News;
use app\services\NewsServiceInterface;
use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use yii\web\UploadedFile;

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


    public function actionShow(int $id): string
    {
        return $this->render('details', ['model' => $this->news->show($id),]);
    }


    public function actionCreate(): string
    {
        $model = new News();

        return $this->render('create', compact('model'));
    }


    /**
     * @throws Exception
     */
    public function actionStore()
    {
        $this->news->store();

        return $this->redirect(['admin/news/index']);
    }


    public function actionEdit(int $id): string
    {
        return $this->render('edit', ['model' => $this->news->show($id),]);
    }


    public function actionUpdate(Request $request, int $id)
    {

        $this->news->update($id);

        return $this->actionShow($id);
    }


    public function actionDestroy(int $id)
    {
        $this->news->delete($id);

        return $this->redirect(['admin/news/index']);
    }
}