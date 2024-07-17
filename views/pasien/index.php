<?php

use app\models\Pasien;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PasienSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pasien', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'header'=>'Id Pasien',
              'value'=>function($model){
               return $model->id;   
              }
            ],
            [
                'header'=>'Nama',
                'value'=>function($model){
                 return $model->nama;   
                }
              ],
              [
                'header'=>'Alamat',
                'value'=>function($model){
                 return $model->alamat;   
                }
              ],
              [
                'header'=>'Jenis Kelamin',
                'value'=>function($model){
                 return $model->jenis_kelamin;   
                }
              ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pasien $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
