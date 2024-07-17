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
    ]); ?>

<?= $form->field($model, 'searchTerm', [
        'labelOptions' => ['style' => 'display:none;']
    ])->textInput(['placeholder' => 'Search...']) ?>

    <?php // echo $form->field($model, 'nomor_telepon') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
