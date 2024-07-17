<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pasien $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pasien-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>


<?= $form->field($model, 'jenis_kelamin')->dropDownList([
    'laki-laki' => 'Laki-laki',
    'perempuan' => 'Perempuan',
], [
    'prompt' => '-Pilih Jenis Kelamin-',
    'options' => [
        'laki-laki' => ['Selected' => $model->jenis_kelamin === 'laki-laki'],
        'perempuan' => ['Selected' => $model->jenis_kelamin === 'perempuan'],
    ]
]) ?>
<?= $form->field($model, 'tanggal_lahir')->input('date') ?>

<?= $form->field($model, 'nomor_telepon')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
