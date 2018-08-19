<?php
/**
 * Created by PhpStorm.
 * User: WINDOWS
 * Date: 07.08.2018
 * Time: 12:10
 */
use yii\widgets\ListView;

$this->title = 'Searching results';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Searching results of '.$words,
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $words,
]);
?>

<?= $this->render('_categories', [
    'categories' => $categories,
]);?>

<div class="col-lg-9">
    <div class="row">
        <div class="title">
            <span>"<?= $words ?>" Searching results :</span>
        </div>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_item',
        ]); ?>
    </div>
</div>
