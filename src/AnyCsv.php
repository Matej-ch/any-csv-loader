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

    public $models = [];

    public $modelsFile = '';

    /**
     * Global delimiter for csv file parsing
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