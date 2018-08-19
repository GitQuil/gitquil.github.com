<?php
/**
 * Created by PhpStorm.
 * User: WINDOWS
 * Date: 06.08.2018
 * Time: 12:47
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class MyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/shop-homepage.css',
        'css/addition.css',
        'vendor/fontawesome/css/all.css',
        'vendor/fontawesome/css/fontawesome.css',
        'vendor/fontawesome/css/regular.css',
        'vendor/fontawesome/css/solid.css',
        'vendor/bootstrap/css/bootstrap.min.css',
    ];
    public $js = [
        'vendor/jquery/jquery.min.js',
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
    ];
}