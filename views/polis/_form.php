<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Polis $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="polis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_poliklinik')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
