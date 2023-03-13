<?php

namespace app\services;

use App\DTO\NewsData;
use app\models\News;
use Throwable;
use Yii;
use yii\base\Exception;
use yii\data\Pagination;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class NewsService implements NewsServiceInterface
{

    /**
     * @throws NotFoundHttpException
     */
    public function getAll(): array
    {
        $query = News::find();

        if ($query === null) {
            throw new NotFoundHttpException;
        }

        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'defaultPageSize' => 5
        ]);

        $news = $query->orderBy('date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return [
            'title' => 'Список новостей',
            'model' => $news,
            'pagination' => $pagination,
        ];

    }


    /**
     * @throws NotFoundHttpException
     */
    public function show(int $id): News
    {
        $news = News::findOne($id);

        if ($news === null) {
            throw new NotFoundHttpException;
        }

        return $news;
    }


    /**
     * @throws Exception
     * @throws NotFoundHttpException
     */
    public function store()
    {
        $model = new News();

        if (Yii::$app->request->isPost) {
            $this->saveNews($model);
        }
    }


    /**
     * @throws Exception
     * @throws NotFoundHttpException
     */
    public function update(int $id)
    {
        $model = News::findOne($id);

        $this->saveNews($model);
    }


    /**
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function delete(int $id): void
    {
        $news = News::findOne($id);

        if(!$news) {
            throw new NotFoundHttpException('Новость не найдена');
        }

        $news->delete();
    }

    /**
     * @throws Exception
     * @throws NotFoundHttpException
     */
    private function saveNews(News $model): void
    {
        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');

            if (isset($model->image)) {
                $model->upload();
            }

            if ($model->save(false)) {
                return;
            }
        }

        throw new NotFoundHttpException('Не удалось сохранить новость');
    }

}