<?php

namespace matejch\anyCsvLoader\widget;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class CsvLoader extends Widget
{

    /**
     * Text in generated button, that redirect to import form
     *
     * @var string
     */
    public $btnText = '';

    /**
     * Delimiter for csv files, if it is empty system tries to detect delimiter automatically
     *
     * @var string
     */
    public $delimiter = ';';

    /**
     * Redirect url after successful data load
     *
     * @var string
     */
    public $redirect = '';

    /**
     * Keys for models for user to select in form
     * If only one is set , no select box is shown
     *
     * @var array
     */
    public $keys = [];

    public function init()
    {
        parent::init();

        \Yii::setAlias('@matejch/anyCsvLoader', __DIR__ . '/..');

        $this->registerTranslations();

        if (empty($this->btnText)) {
            $this->btnText = Yii::t('anyCsvLoader/view', 'btnText');
        }
    }

    public function run()
    {
        parent::run();

        return Html::a($this->btnText, ['csv/index', 'delimiter' => $this->delimiter, 'redirect' => $this->redirect, 'models' => $this->keys], ['class' => 'btn btn-primary']);
    }

    public function registerTranslations(): void
    {
        if (Yii::$app->has('i18n')) {
            Yii::$app->i18n->translations['anyCsvLoader/*'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'forceTranslation' => true,
                'basePath' => '@matejch/anyCsvLoader/messages',
                'fileMap' => [
                    'pageGuide/view' => 'view.php',
                    'pageGuide/model' => 'model.php',
                ],
            ];
        }
    }
}