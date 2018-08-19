<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\MyAsset;
use common\widgets\Alert;
use yii\widgets\ActiveForm;

MyAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand icon" href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">TRUSCO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['site/info', 'one' => 'about']) ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['site/info', 'one' => 'services']) ?>">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['site/contact']) ?>">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" id="content">
    <div class="row">
        <div class="col-lg-12">
            <form id="search" action="<?= Yii::$app->urlManager->createUrl(['site/search'])?>" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="words" class="form-control" placeholder="What are you looking for?" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <?= $content ?>
    </div>
</div>
<div id="addition">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <h4>Info</h4>
                <ul>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/info', 'one' => 'about']) ?>">About us</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/info', 'one' => 'our partners']) ?>">Our partners</a></li>
                    <li><a href="<?= Yii::$app->urlManager->createUrl(['site/info', 'one' => 'services']) ?>">Services</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <h4>Contact us</h4>
                <ul>
                    <li><a href="">info@trusco.com</a></li>
                    <li><a href="">support@trusco.com</a></li>
                    <li>+998(94)646-54-47</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <h4>Links</h4>
                <ul>
                    <li><a href=""><i class="fab fa-facebook-square">&nbsp</i>Facebook</a></li>
                    <li><a href=""><i class="fab fa-twitter-square">&nbsp</i>Twitter</a></li>
                    <li><a href=""><i class="fab fa-google-plus-square">&nbsp</i>Google+</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <a class="navbar-brand icon" href="<?= Yii::$app->urlManager->createUrl(['site/index'])?>">TRUSCO</a>
                <p>Electronic trade company catalog</p>
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
<footer class="py-5 bg-dark">
    <p>Copyright &copy 2018 Trusco.com, All Rights Reserved</p>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
