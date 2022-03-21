<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Kios */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kios Nonaktif';

?>
<div class="kios-index">
<h1>
    <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
    <?= Html::encode($this->title) ?>
</h1>

<div class="box"><div class="box-body"><div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [   
                'headerOptions'=>['style'=>'width:10%'],
                'attribute'=>'no_kios'
            ],
            'nama',
            'no_hp',
            'jenis_dagang',
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div></div></div>

</div>
