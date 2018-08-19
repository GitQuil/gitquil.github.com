<?php
/**
 * Created by PhpStorm.
 * User: WINDOWS
 * Date: 07.08.2018
 * Time: 12:18
 */
?>
<div class="col-lg-3">

    <h2 class="my-4">Categories</h2>
    <ul class="nav nav-pills flex-column">
        <?php foreach($categories as $one): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl(['site/category', 'one' => $one->url])?>"><?= $one->name ?></a>
            </li>
        <?php endforeach;?>
    </ul>

</div>
