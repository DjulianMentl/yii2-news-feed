<?php

namespace app\services;

use app\models\News;

interface SendEmailsInterface
{
    public function send(News $news);
}