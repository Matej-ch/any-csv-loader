<?php

namespace matejch\anyCsvLoader\assets;

use yii\web\AssetBundle;

class CsvLoaderAsset extends AssetBundle
{
    public $sourcePath = '@matejch/anyCsvLoader/web';

    public $css = [
        'dist/main.css',
    ];

    public $js = [
        'dist/main.js',
    ];

    public $depends = [];
}