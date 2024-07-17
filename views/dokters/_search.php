<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DoktersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dokters-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_poliklinik') ?>

    <?= $form->field($model, 'nama_dokter') ?>

    <?= $form->field($model, 'spesialis') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'nomor_telepon') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
