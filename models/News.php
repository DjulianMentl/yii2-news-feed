<?php

namespace app\models;

use DateTime;
use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\web\Request;

/**
 * News model
 *
 * @property integer $id
 * @property string $title
 * @property string $preview
 * @property string $text
 * @property DateTime $date
 * @property integer $counter
 * @property $image
 */
class News extends ActiveRecord
{

    public function rules(): array
    {
        return [
            [['title', 'preview', 'text'], 'required'],
            [['title'], 'string', 'max' => 200,],
            [['preview'], 'string', 'max' => 1000,],
            [['text'], 'string', 'max' => 2000,],
            [['image'], 'image', 'skipOnEmpty' => true, 'extensions' => 'jpg, gif', 'maxWidth' => 300, 'maxHeight' => 300],
        ];
    }

//    public function upload(): bool|string
//    {
//        if ($this->validate()) {
//            $filePath = 'web/images' . $this->image->baseName . '.' . $this->image->extension;
//            $this->image->saveAs($filePath);
//            return $filePath;
//        } else {
//            return false;
//        }
//    }


    /**
     * @throws Exception
     */
    public function upload(): bool
    {
        if ($this->validate()) {
            $this->image->saveAs("images/{$this->image->baseName}.{$this->image->extension}");
            return true;
        } else {
            return false;
        }
    }
}