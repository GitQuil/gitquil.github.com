<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $description
 * @property string $country
 * @property string $company
 * @property string $price
 * @property string $img
 * @property string $meta_desc
 * @property string $meta_key
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $imageFile;

    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'description', 'country', 'company', 'price', 'url', 'meta_desc', 'meta_key'], 'required'],
            [['category_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'url'], 'unique'],
            [['price'], 'number'],
            [['name', 'country', 'company', 'img', 'url'], 'string', 'max' => 50],
            [['meta_desc', 'meta_key'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => ['jpg', 'png'], 'maxSize' => 1024*1024, 'mimeTypes' => ['image/jpeg', 'image/png']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'name' => 'Name',
            'description' => 'Description',
            'country' => 'Country',
            'company' => 'Company',
            'price' => 'Price',
            'img' => 'Img',
            'url' => 'Url',
            'meta_desc' => 'Meta Desc',
            'meta_key' => 'Meta Key',
        ];
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
