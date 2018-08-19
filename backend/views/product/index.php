<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'category_id',
                'filter' => ArrayHelper::map(Category::getCategories(), 'id', 'name'),
                'value' => 'category.name',
            ],
            'name',
//            'description:ntext',
            'country',
            'company',
            [
                'attribute' => 'price',
                'value' => function($model){
                    return $model->price."$";
                },
            ],
            [
                'label' => 'Url',
                'attribute' => 'url',
                'value' => function($model){
                    return Html::a($model->url, 'http://trusco.com/product/'.$model->url);
                },
                'format' => 'raw',
            ],
            //'img',
//            'meta_desc',
//            'meta_key',

            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>
</div>
