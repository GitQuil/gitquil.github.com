<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'label' => 'Url',
                'value' => Html::a($model->url, 'http://trusco.com/category/'.$model->url),
                'format' => 'raw',
            ],
            [
                'label' => 'Image',
                'value'=>Yii::$app->urlManager->createUrl($model->img),
                'format' => ['image',['width'=>'200','height'=>'200']],
            ],
            'meta_desc',
            'meta_key',
        ],
    ]) ?>

</div>
