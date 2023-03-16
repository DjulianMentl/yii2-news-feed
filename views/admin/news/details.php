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
            <?= Html::img(Url::to('images/' . Html::encode($model->image), true), ['alt' => "Картинка новости", 'class' => "my-2"]) ?>
        </div>
    <?php } ?>

    <div class="my-2"><?= Html::encode($model->text) ?></div>

    <div class="d-flex">
        <div class="align-self-center m-2">
            <?= Html::a("Редактировать", Url::to(['admin/news/edit', 'id' => $model->id]), ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
        <div class="align-self-center m-2">
            <?php $form = ActiveForm::begin([
                'id' => 'news-delete-form',
                'action' => Url::to(['admin/news/destroy', 'id' => $model->id]),
                'method' => 'post',
            ]) ?>

            <?= Html::hiddenInput('_method', 'delete') ?>
            <?= Html::submitButton('Удалить', ['class' => 'btn btn-danger btn-sm']) ?>
            <?php ActiveForm::end() ?>
        </div>
    </div>