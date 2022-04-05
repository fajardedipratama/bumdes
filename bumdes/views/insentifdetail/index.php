<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InsentifdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Insentif Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insentif-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Insentif Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'insentif_id',
            'pengurus_id',
            'nominal',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, InsentifDetail $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
