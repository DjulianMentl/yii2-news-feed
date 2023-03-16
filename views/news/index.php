<?php

/** @var yii\web\View $this */
/** @var app\models\News $model */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = Html::encode($title);
$this->params['breadcrumbs'][] = $this->title;

?>
<h1 class="my-2"><?= $this->title ?></h1>

<div>
    <?php foreach($model as $news) {?>

    <div class="my-3">
        <h3 class="my-1"><?= Html::a(Html::encode($news->date) . ' — ' . Html::encode($news->title),
            Url::to(['news/show', 'id' => $news->id])) ?></h3>

        <div class="my-2"><?= Html::encode($news->preview) ?></div>
    </div>
    <?php } ?>

    <div class="pagination my-2"><?= LinkPager::widget([

            'pagination' => $pagination,
            'maxButtonCount' => 5,
            'activePageCssClass' => 'active',
            'linkContainerOptions' => ['class' => 'page-item'],
            'linkOptions' => ['class' => 'page-link'],
            'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],

        ]) ?></div>
</div>