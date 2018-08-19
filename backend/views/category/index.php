<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'label' => 'Url',
                'attribute' => 'url',
                'value' => function($model){
                    return Html::a($model->url, 'http://trusco.com/category/'.$model->url);
                },
                'format' => 'raw',
            ],
//            'img',
            'meta_desc',
            'meta_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
