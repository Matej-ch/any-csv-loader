<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var array $maps */

$this->title = Yii::t('anyCsvLoader/view', 'csv loader');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="guide-index mt-20 w-full px-4">

    <h1 class="mt-1 mb-2 text-xl"><?= $this->title ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'js-load-file-form',
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>
    <div>

        <?= Html::dropDownList('models', null, [], ['prompt' => 'Pick a model...', 'class' => 'input']) ?>

        <?= Html::textInput('input', null, ['placeholder' => 'Paste url with csv file here...', 'class' => 'input']) ?>

        <?= Html::fileInput('file', null, ['placeholder' => 'Pick a file from computer...', 'class' => 'input']) ?>

        <?= Html::submitButton('Load file to table', ['id' => 'js-load-file', 'class' => 'bg-green-600 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-green-700 transition duration-300']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <div>
        <p>Preview csv file content (first few rows)</p>
        <?= Html::a('Load more preview rows', ['load-rows'], ['id' => 'js-load-preview', 'class' => 'bg-blue-500 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300']) ?>
    </div>


    <?php $form = ActiveForm::begin([
        'id' => 'js-load-map-form',
        'action' => ['load-map']
    ]); ?>

    <div>
        <p>Pick previously created map</p>
        <?= Html::dropDownList('map', null, $maps, ['prompt' => 'Pick a map...', 'class' => 'input']) ?>
    </div>

    <?= Html::submitButton('Load csv map', ['id' => 'js-load-map', 'class' => 'bg-blue-500 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300']) ?>
    <?php ActiveForm::end(); ?>

    <?php $form = ActiveForm::begin([
        'id' => 'js-save-map-form',
        'action' => ['save-map']
    ]); ?>

    <p>Save new map here</p>

    <?= Html::submitButton('Save csv map', ['id' => 'js-save-map', 'class' => 'bg-blue-500 text-white px-4 py-2 rounded-md text-1xl font-medium hover:bg-blue-700 transition duration-300']) ?>
    <?php ActiveForm::end(); ?>

</div>
