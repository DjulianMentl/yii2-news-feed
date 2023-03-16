<?php

namespace app\services;

use app\models\News;

interface NewsServiceInterface
{
    public function getAll();
    public function show(int $id);
    public function update(News $model);
}
