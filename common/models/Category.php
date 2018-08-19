<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $name
 * @property string $url
 * @property string $img
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $imageFile;

    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'meta_desc', 'meta_key'], 'required'],
            [['name', 'url', 'img'], 'string', 'max' => 50],
            [['name', 'url'], 'unique'],
            [['meta_desc', 'meta_key'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => ['jpeg', 'jpg', 'png'], 'maxSize' => 1024*1024, 'mimeTypes' => ['image/jpeg', 'image/png']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'img' => 'Img',
        ];
    }

    public function beforeDelete(){
        if(!parent::beforeDelete()){
            return false;
        }
        Product::deleteAll(['id' => $this->id]);
        return true;
    }



    public function getProducts(){
        return $this->hasMany(Product::className(),['category_id' => 'id']);
    }

    public static function getCategories(){
        return self::find()->all();
    }
}
