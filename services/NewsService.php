<?php

namespace app\services;

use app\models\News;

use app\config\ExceptionMessages;
use Throwable;
use Yii;
use yii\base\Exception;
use yii\data\Pagination;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;



class NewsService implements NewsServiceInterface
{

    /**
     * @throws NotFoundHttpException
     */
    public function getAll(): array
    {
        $query = News::find();

        if ($query === null) {
            throw new NotFoundHttpException(ExceptionMessages::NEWS_OUTPUT_ERROR_MESSAGE);
        }

        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'defaultPageSize' => Yii::$app->params['pageSize'],
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
        return $this->findModel($id);
    }


    /**
     * @throws Exception
     * @throws NotFoundHttpException
     */
    public function store(News $model): void
    {
        $this->saveNews($model);
    }


    /**
     * @throws Exception
     * @throws NotFoundHttpException
     */
    public function update(News $model):void
    {
        $this->saveNews($model);
    }


    /**
     * @throws Throwable
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
    public function delete(int $id): void
    {
        $this->findModel($id)->delete();
    }

    /**
     * @throws Exception
     * @throws NotFoundHttpException
     */
    private function saveNews(News $model): void
    {
        if (isset($model->image) && !is_string($model->image)) {
            $model->upload();
        }

        if ($model->save(false)) {
            return;
        }

        throw new NotFoundHttpException(ExceptionMessages::NEWS_SAVE_ERROR_MESSAGE);
    }

    /**
     * @throws NotFoundHttpException
     */
    private function findModel(int $id): News
    {
        $news = News::findOne($id);

        if ($news) {
            return $news;
        }

        throw new NotFoundHttpException(ExceptionMessages::NEWS_SEARCH_ERROR_MESSAGE);
    }
}