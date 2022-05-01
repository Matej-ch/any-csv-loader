<?php

namespace matejch\anyCsvLoader;

use matejch\anyCsvLoader\assets\CsvLoaderAsset;
use Yii;
use yii\base\Module;

class AnyCsv extends Module
{
    public $controllerNamespace = 'matejch\anyCsvLoader\controllers';

    public $defaultRoute = 'page-guide/index';

    public function init()
    {
        parent::init();

        Yii::setAlias('@matejch/anyCsvLoader', __DIR__);

        CsvLoaderAsset::register(Yii::$app->view);

        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        if (Yii::$app->has('i18n')) {
            Yii::$app->i18n->translations['anyCsvLoader/*'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'forceTranslation' => true,
                'basePath'  => '@matejch/anyCsvLoader/messages',
                'fileMap' => [
                    'anyCsvLoader/view' => 'view.php',
                    'anyCsvLoader/model' => 'model.php',
                ],
            ];
        }
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('anyCsvLoader/' . $category, $message, $params, $language);
    }
}