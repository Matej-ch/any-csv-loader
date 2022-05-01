<?php

namespace matejch\anyCsvLoader\assets;

use yii\web\AssetBundle;

class CsvLoaderAsset extends AssetBundle
{
    public $sourcePath = '@matejch/anyCsvLoader/web';

    public $css = [
        'css/style.min.css',
    ];

    public $js = [
        'js/style.min.js',

    ];

    public $depends = [];
}