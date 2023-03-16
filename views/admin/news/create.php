<?php

/** @var yii\web\View $this */
/** @var app\models\News $model */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
//    'id' => 'news-create-form',
    'action' => Url::to(['admin/news/store']),
    'method' => 'post',
    'options' => ['enctype' => 'multipart/form-data'],
]) ?>

<?= $form->field($model, 'title')->textarea(['rows' => 2])->label('Заголовок')->hint("<?= $model->title ?? '' ?>") ?>
<?= $form->field($model, 'preview')->textarea(['rows' => 3])->label('Анонс')->hint("<?= $model->preview ?? '' ?>") ?>
<?= $form->field($model, 'text')->textarea(['rows' => 6])->label('Текст новости')->hint("<?= $model->text ?? '' ?>") ?>
<?php //= Html::fileInput('image') ?>
<?= $form->field($model, 'image')->fileInput(['class' => 'btn btn-default btn-sm my-2'])->label('') ?>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary btn-sm m-2']) ?>

<?php ActiveForm::end() ?>
