<?php
/**
 * Created by PhpStorm.
 * User: WINDOWS
 * Date: 06.08.2018
 * Time: 15:02
 */?>
<div class="col-lg-12 col-md-12 col-sm-12 item">
    <img src="<?= Yii::$app->urlManager->createUrl("admin/".$model->img) ?>">
    <div class="intro-desc">
        <h5><?= $model->name ?></h5>
        <table>
            <tr>
                <td>Price :</td>
                <td><?= $model->price."$" ?></td>
            </tr>
            <tr>
                <td>Company :</td>
                <td><?= $model->company ?></td>
            </tr>
            <tr>
                <td>Country :</td>
                <td><?= $model->country ?></td>
            </tr>
        </table>
        <a href="<?= Yii::$app->urlManager->createUrl(['site/product', 'one' => $model->url])?>" class="btn btn-outline-info"><i class="fa fa-eye">&nbsp</i>view</a>
    </div>
    <div class="clear"></div>
</div>
