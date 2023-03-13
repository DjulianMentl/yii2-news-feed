<?php

namespace app\services;

use App\DTO\NewsData;

interface NewsServiceInterface
{
    public function getAll();
    public function show(int $id);
    public function update(int $id);
}
