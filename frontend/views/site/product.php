<?php
/**
 * Created by PhpStorm.
 * User: WINDOWS
 * Date: 06.08.2018
 * Time: 17:45
 */

$this->title = $product->name;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $product->meta_desc,
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $product->meta_key,
]);
?>
<div class="col-lg-12">
    <div class="row">
        <div class="title">
            <span><?= $product->name ?></span>
        </div>
        <div id="product-info">
            <img src="<?= Yii::$app->urlManager->createUrl( 'admin/'.$product->img) ?>">
            <div>
                <h4>Description</h4>
                <p><?= $product->description ?></p>
            </div>
            <div class="clear"></div>
            <table>
                <tr>
                    <td>Price :</td>
                    <td><?= $product->price."$" ?></td>
                </tr>
                <tr>
                    <td>Company :</td>
                    <td><?= $product->company ?></td>
                </tr>
                <tr>
                    <td>Country :</td>
                    <td><?= $product->country ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row" id="same-prod">
        <div class="title">
            <span>Same products</span>
        </div>
        <?php
        if($products) {
            foreach ($products as $one): ?>
                <div class="same-item">
                    <a href="">
                        <img src="<?= Yii::$app->urlManager->createUrl('admin/' . $one->img) ?>">
                        <p class="same-title"><?= $one->name ?></p>
                    </a>
                </div>
            <?php endforeach;
        } else echo "Not relevant products";
        ?>
    </div>
    <!-- /.row -->

</div>
