<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SetorankiosdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setoran Kios Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-kios-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Setoran Kios Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'setoran_id',
            'kios_id',
            'biaya',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SetoranKiosDetail $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
