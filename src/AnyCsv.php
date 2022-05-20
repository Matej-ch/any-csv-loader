<?php

namespace matejch\anyCsvLoader;

use matejch\anyCsvLoader\assets\CsvLoaderAsset;
use Yii;
use yii\base\BootstrapInterface;
use yii\base\InvalidConfigException;
use yii\base\Module;
use yii\helpers\Json;
use yii\web\UrlRule;

class AnyCsv extends Module implements BootstrapInterface
{
    public $controllerNamespace = 'matejch\anyCsvLoader\controllers';

    public $defaultRoute = 'csv/index';

    /**
     * Array of your models, that are allowed to be used in module
     * And for loading data from csv files
     *
     * $models array can contain `key => class string`
     * or `key => array` containing 'model' key with class string and 'guarded' key with array of model attributes
     * that cannot be changed
     *
     * ID OF MODEL IS ALWAYS GUARDED when loading data from csv
     *
     * Example:
     *
     *  [
     *  'product' => \app\models\Product::class,
     *  'order' => [
     *      'model' => \app\models\Order::class,
     *      'guarded' => ['id','name'],
     *  ]
     * ]
     *
     * @var array
     */
    public $models = [];

    /**
     * File with json object, containing same settings for models like $models attribute
     * $models attribute has higher priority than $modelsFile
     *
     * @var string
     */
    public $modelsFile = '';

    /**
     * Global delimiter for csv file parsing
     * Delimiter can be also set in widget or automatically detected
     *
     * @var string
     */
    public $delimiter = ';';

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        Yii::setAlias('@matejch/anyCsvLoader', __DIR__);

        CsvLoaderAsset::register(Yii::$app->view);

        if (empty($this->models) && empty($this->modelsFile)) {
            throw new InvalidConfigException('models or modelsFile must be set');
        }

        if (empty($this->models) && !empty($this->modelsFile)) {
            if (!($fileContents = file_get_contents($this->modelsFile))) {
                throw new InvalidConfigException('modelsFile failed to load');
            }

            \Yii::configure($this, Json::decode($fileContents));
        }

        $this->registerTranslations();
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

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $app->getUrlManager()->addRules([
                ['class' => UrlRule::class, 'pattern' => '/csv/index', 'route' => $this->id . '/csv/index'],
            ], false);
        }
    }
}