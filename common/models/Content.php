<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property string $id
 * @property string $page_id
 * @property string $text
 * @property string $meta_desc
 * @property string $meta_key
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'text', 'meta_desc', 'meta_key'], 'required'],
            [['page_id'], 'integer'],
            [['text'], 'string'],
            [['meta_desc', 'meta_key'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'text' => 'Text',
            'meta_desc' => 'Meta Desc',
            'meta_key' => 'Meta Key',
        ];
    }

    public function getPage(){
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }
}
