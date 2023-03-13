<?php

/** @var yii\web\View $this */
/** @var app\models\News $model */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = Html::encode($title);
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= $this->title ?></h1>

<div>
    <?php foreach($model as $news) {?>
    <div>

        <h3><?= Html::a(Html::encode($news->date) . ' — ' . Html::encode($news->title),
            Url::to(['admin/news/show', 'id' => $news->id])) ?></h3>

        <div class="news-preview"><?= Html::encode($news->preview) ?></div>
    </div>
    <?php } ?>

    <div>
        <?= Html::a("Добавить новость", Url::to(['admin/news/create'])) ?>
    </div>

    <div class="pagination"><?= LinkPager::widget([

            'pagination' => $pagination,
            'maxButtonCount' => 5,
            'activePageCssClass' => 'active',
            'linkContainerOptions' => ['class' => 'page-item'],
            'linkOptions' => ['class' => 'page-link'],
            'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],

        ]) ?></div>
</div>