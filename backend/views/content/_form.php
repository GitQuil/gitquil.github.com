<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Page;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_id')->dropDownList(Page::getPages()) ?>

    <?= $form->field($model, 'text')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
        ],
    ]);
    ?>
    <?= $form->field($model, 'meta_desc')->textInput() ?>
    <?= $form->field($model, 'meta_key')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
