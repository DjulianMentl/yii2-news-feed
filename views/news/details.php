<?php

/** @var yii\web\View $this */
/** @var app\models\News $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->id;
$this->params['breadcrumbs'][] = $this->title;

?>
<h1 class="my-2"><?= Html::encode($model->date) ?> — <?= Html::encode($model->title) ?></h1>
    <?php if ($model->image !== null) { ?>
        <div>
            <?= Html::img(Url::to('images/' . Html::encode($model->image), true), ['alt' => "Картинка новости", 'class' => 'my-2']) ?>
        </div>
    <?php } ?>

<div class="my-2"><?= Html::encode($model->text) ?></div>
