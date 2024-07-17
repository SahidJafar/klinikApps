<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Dokters $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dokters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_poliklinik')->dropDownList($model->getPoliklinikList(), [
        'prompt' => 'Pilih Poliklinik', 
    ])->label('Nama Poliklinik') ?>

    <?= $form->field($model, 'nama_dokter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spesialis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_telepon')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
