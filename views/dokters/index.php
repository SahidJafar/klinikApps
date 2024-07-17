<?php

use app\models\Dokters;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\DoktersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Dokter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokters-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dokter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header'=>'Id Dokter',
                'value'=>function($model){
                 return $model->id;   
                }
              ],
              [
                'header' => 'Nama Poliklinik',
                'value' => function($model) {
                    return $model->poliklinik ? $model->poliklinik->nama_poliklinik : 'N/A';
                }
            ],
              [
                'header'=>'Nama Dokter',
                'value'=>function($model){
                 return $model->nama_dokter;   
                }
              ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dokters $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
