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
     'css/bootstrap.css',
     'css/kv-export-data.css', 
     'kv-export-columns.css',
    ];
    public $js = [
    'js/jquery.js',
    'js/bootstrap.js',

    ];
    public $depends = [
       'yii\web\YiiAsset',
       'yii\bootstrap\BootstrapAsset',
    ];
}
