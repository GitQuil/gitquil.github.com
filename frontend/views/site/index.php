<?php

/* @var $this yii\web\View */

$this->title = 'Welcome to Trusco.com';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Trusco.com electrtonic trading company'
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Electronic products, air-conditioners, blenders, home-appliences',
]);
?>

<div class="col-lg-12">
    <div class="row">
        <div class="title">
            <span>Categories</span>
        </div>
        <?php foreach($categories as $one): ?>
            <div class="category-item-box">
                <a href="<?= Yii::$app->urlManager->createUrl(['site/category', 'one' => $one->url])?>"><img src="<?= Yii::$app->urlManager->createUrl('admin/'.$one->img) ?>"></a>
                <a href="<?= Yii::$app->urlManager->createUrl(['site/category', 'one' => $one->url])?>" class="category-title">Air conditioners</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
