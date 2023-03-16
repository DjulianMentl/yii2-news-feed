<?php

/** @var yii\web\View $this */
/** @var app\models\News $model */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'id' => 'news-create-form',
    'action' => Url::to(['admin/news/update', 'id' => $model->id]),
    'method' => 'post',
    'options' => ['enctype' => 'multipart/form-data'],
]) ?>

<?= $form->field($model, 'title')->textarea(['rows' => 2])->label('Заголовок')->hint("<?= $model->title ?? '' ?>") ?>
<?= $form->field($model, 'preview')->textarea(['rows' => 3])->label('Анонс')->hint("<?= $model->preview ?? '' ?>") ?>
<?= $form->field($model, 'text')->textarea(['rows' => 6])->label('Текст новости')->hint("<?= $model->text ?? '' ?>") ?>


<?php if(!empty($model->image)) { ?>
    <div>
        <?= Html::img(Url::to('images/' . Html::encode($model->image), true), ['alt' => "Картинка новости", 'class' => "my-2"]) ?>
        <?= Html::checkbox('removeImg', false, ['label' => 'Удалить изображение', 'value' => "<?= $model->image ?>", 'class' => 'checkbox-primary m-2']) ?>
    </div>
<?php }
else { ?>
    <?= $form->field($model, 'image')->fileInput(['class' => 'btn btn-default btn-sm m-2'])->label('') ?>
<?php } ?>


<?= Html::hiddenInput('_method', 'patch') ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary btn-sm m-2']) ?>

<?php ActiveForm::end() ?>
