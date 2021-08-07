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
        'css/all.min.css',
        'css/quick-website.css',
        'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css',
    ];
    public $js = [
        'js/main.js?v=1',
        'js/jquery-3.6.0.js',
        // 'js/bootstrap.min.js',
        'js/bootstrap.bundle.min.js',
        'js/all.min.js',
        'js/quick-website.min.js',
        'https://polyfill.io/v3/polyfill.min.js?features=es6',
        'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js',
        'https://unpkg.com/sweetalert/dist/sweetalert.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.4/jquery.simplePagination.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
