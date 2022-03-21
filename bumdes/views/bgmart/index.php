<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\BgmartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setoran BGMart';
?>
<div class="bgmart-index">
    
    <div class="row">
    <div class="col-sm-9">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="col-sm-3">
        <p>
            <?= Html::a('<i class="fa fa-fw fa-plus-square"></i> Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    </div>

    <div class="box"><div class="box-body"><div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'tgl_setor',
                'format'=>['date','dd-MM-Y'],
                'filter'=> DatePicker::widget([
                    'model'=>$searchModel,'attribute'=>'tgl_setor','clientOptions'=>[
                      'autoclose'=>true, 'format' => 'dd-mm-yyyy','orientation'=>'bottom'
                    ],
                ]),
            ],
            'nama_setoran',
            [
                'attribute'=>'jumlah',
                'format'=>['currency','Rp. '],
            ],
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
</div></div></div>
</div>
