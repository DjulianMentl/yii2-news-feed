<?php

/** @var yii\web\View $this */
/** @var app\models\News $model */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $model->id;
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($model->date) ?> — <?= Html::encode($model->title) ?></h1>
    <?php if ($model->image !== null) {?>
        <div>
            <?= Html::img(Url::to('images/' . Html::encode($model->image), true), ['alt' => "Картинка новости",]) ?>
        </div>
    <?php } ?>

    <div class="news-text"><?= Html::encode($model->text) ?></div>


    <div class="button-news-details">
        <div>
            <?= Html::a("Редактировать", Url::to(['admin/news/edit', 'id' => $model->id]), ['class' => 'btn']) ?>
        </div>
        <div>
            <?php $form = ActiveForm::begin([
                'id' => 'news-delete-form',
                'action' => Url::to(['admin/news/destroy', 'id' => $model->id]),
                'method' => 'post',
            ]) ?>

            <?= Html::hiddenInput('_method', 'delete') ?>
            <?= Html::submitButton('Удалить', ['class' => 'btn']) ?>
            <?php ActiveForm::end() ?>
        </div>
    </div>