<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PolisSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="polis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get'
    ]); ?>

<?= $form->field($model, 'searchTerm', [
        'labelOptions' => ['style' => 'display:none;']
    ])->textInput(['placeholder' => 'Search...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
