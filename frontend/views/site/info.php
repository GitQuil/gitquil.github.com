<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => (!$content)? 'Description' : $content->meta_desc,
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => (!$content)? 'Keywords' : $content->meta_key,
]);
?>
<div class="site-about">
    <h1><?= Html::encode($title) ?></h1>

    <p><?= (!$content)? 'Here will be info' : $content->text; ?></p>

    <code><?= __FILE__ ?></code>
</div>
