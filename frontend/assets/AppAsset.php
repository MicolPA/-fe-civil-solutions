<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/main.css',
        'css/bootstrap.css',
        'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css',
    ];
    public $js = [
        'js/main.js',
        'js/jquery-3.6.0.js',
        'js/bootstrap.js',
        'js/bootstrap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
