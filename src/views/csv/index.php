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

    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-rotate-clockwise" width="28" height="28"
         viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
         stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M4.05 11a8 8 0 1 1 .5 4m-.5 5v-5h5"/>
    </svg>

    <svg class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400"
         viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
            fill="currentColor"/>
        <path
            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
            fill="currentFill"/>
    </svg>

    <button disabled type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
        <svg class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="#E5E7EB"/>
            <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentColor"/>
        </svg>
        Loading...
    </button>
</div>
