<?php

use yii\helpers\Html; ?>

<template id="js-template-column">
    <div>
        <label for="">
            <?= Html::checkbox('', false) ?>
        </label>

        <label for="">
            <?= Html::dropDownList('', null, []) ?>
        </label>
    </div>
</template>
