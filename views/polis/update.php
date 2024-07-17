<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Polis $model */

$this->title = 'Update Polis: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Poli', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="polis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
