<?php

use app\models\Polis;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PolisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Poli';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polis-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Poli', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header'=>'Id Poli',
                'value'=>function($model){
                 return $model->id;   
                }
              ],
              [
                'header'=>'Nama Poli',
                'value'=>function($model){
                 return $model->nama_poliklinik;   
                }
              ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Polis $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

</div>
