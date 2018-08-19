<?php
/**
 * Created by PhpStorm.
 * User: WINDOWS
 * Date: 06.08.2018
 * Time: 13:40
 */

use yii\widgets\ListView;

$this->title = $category->name;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $category->meta_desc,
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $category->meta_key,
]);
?>

<?= $this->render('_categories',[
    'categories' => $categories,
]);?>
<div class="col-lg-9">
    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php for($i = 0; $i < count($banners); $i++) {?>
                <?php if($i == 0){ ?>
                    <?php echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="active"></li>'; ?>
                <?php }else echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>'; ?>
            <?php } ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php $i = 0; foreach($banners as $one):
                if($i == 0) echo '<div class="carousel-item active">';
                else echo '<div class="carousel-item">'
            ?>
                <img class="d-block img-fluid" src="<?= Yii::$app->urlManager->createUrl('admin/'.$one->img)?>" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?= $one->title ?></h5>
                    <p><?= $one->text ?></p>
                </div>
            </div>
            <?php $i++; endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row">
        <div class="title">
            <span><?= $category->name ?></span>
        </div>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_item',
        ]); ?>
    </div>
</div>