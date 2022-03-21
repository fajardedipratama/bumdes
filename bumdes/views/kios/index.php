<?php
use app\models\Kios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Kios */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kios';

?>
<div class="kios-index">
<div class="row">
    <div class="col-sm-8">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="col-sm-4">
        <p>
            <?= Html::a('<i class="fa fa-fw fa-plus-square"></i> Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('<i class="fa fa-fw fa-book"></i> Kios Nonaktif', ['nonaktif'], ['class' => 'btn btn-danger']) ?>
        </p>  
    </div>
</div>

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
            'jenis_dagang',
            [
                'attribute'=>'awal_sewa',
                'headerOptions'=>['style'=>'width:20%'],
                'format' => ['date','dd-MM-Y'],
                'filter'=> DatePicker::widget([
                    'model'=>$searchModel,'attribute'=>'awal_sewa','clientOptions'=>[
                      'autoclose'=>true, 'format' => 'dd-mm-yyyy','orientation'=>'bottom'
                    ],
                ]),
            ],
            [
                'attribute'=>'akhir_sewa',
                'headerOptions'=>['style'=>'width:20%'],
                'format' => ['date','dd-MM-Y'],
                'filter'=> DatePicker::widget([
                    'model'=>$searchModel,'attribute'=>'akhir_sewa','clientOptions'=>[
                      'autoclose'=>true, 'format' => 'dd-mm-yyyy','orientation'=>'bottom'
                    ],
                ]),
            ],
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div></div></div>

</div>
