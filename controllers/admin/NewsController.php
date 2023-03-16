<?php

namespace app\controllers\admin;

use app\models\News;
use app\services\NewsServiceInterface;
use ExceptionMessages;
use Yii;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\di\NotInstantiableException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
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


    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'index', 'show', 'create', 'store', 'edit', 'update', 'destroy'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function actionIndex(): string
    {
        return $this->render('index', $this->news->getAll());
    }


    public function actionShow(int $id): string
    {
        return $this->render('details', ['model' => $this->news->show($id),]);
    }


    /**
     * @throws NotInstantiableException
     * @throws InvalidConfigException
     */
    public function actionCreate(): string
    {
        $model = Yii::$container->get(News::class);

        return $this->render('create', compact('model'));
    }


    /**
     * @throws Exception
     */
    public function actionStore(): Response
    {
        $model = Yii::$container->get(News::class);
        $model = $this->loadPostData($model);

        $this->news->store($model);

        return $this->redirect(['admin/news/index']);
    }


    public function actionEdit(int $id): string
    {
        return $this->render('edit', ['model' => $this->news->show($id),]);
    }


    /**
     * @throws NotFoundHttpException
     */
    public function actionUpdate(int $id): string
    {
        $model = $this->news->show($id);
        $model = $this->loadPostData($model);

        if (Yii::$app->request->post('removeImg')) {
            $model->image = null;
        }

        $this->news->update($model);

        return $this->actionShow($id);
    }


    public function actionDestroy(int $id): Response
    {
        $this->news->delete($id);

        return $this->redirect(['admin/news/index']);
    }


    /**
     * @throws NotFoundHttpException
     */
    private function loadPostData(News $model): News
    {
        if ($model->load(Yii::$app->request->post())) {
            if (empty($model->image)) {
                $model->image = UploadedFile::getInstance($model, 'image');
            }

            return $model;
        }

        throw new NotFoundHttpException(ExceptionMessages::NEWS_SAVE_ERROR_MESSAGE);
    }
}