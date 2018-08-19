<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property string $id
 * @property string $img
 * @property string $title
 * @property string $text
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $imageFile;

    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['img', 'title', 'text'], 'string', 'max' => 50],
            [['imageFile'], 'file', 'extensions' => ['jpeg', 'png', 'jpg'], 'maxSize' => 1024*1024, 'mimeTypes' => ['image/jpeg', 'image/png']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }
}
