<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MobilservisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perawatan Mobil';
?>
<div class="mobil-servis-index">

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
                'attribute'=>'tgl_servis',
                'headerOptions'=>['style'=>'width:15%'],
                'format' => ['date','dd-MM-Y'],
                'filter'=> DatePicker::widget([
                    'model'=>$searchModel,'attribute'=>'tgl_servis','clientOptions'=>[
                      'autoclose'=>true, 'format' => 'dd-mm-yyyy','orientation'=>'bottom'
                    ],
                ]),
            ],
            [ 
                'attribute'=>'mobil_id',
                'headerOptions'=>['style'=>'width:25%'],
                'value'=>function($data){
                    return $data->mobil->merek.' ('.$data->mobil->nopol.')';
                },
                'filter'=>\kartik\select2\Select2::widget([
                    'model'=>$searchModel,'attribute'=>'mobil_id','data'=>$mobil,
                    'options'=>['placeholder'=>'Mobil'],'pluginOptions'=>['allowClear'=>true]
                ]),
            ],
            'keterangan',
            [
                'attribute'=>'biaya',
                'format' => ['currency','Rp. '],
                'headerOptions'=>['style'=>'width:20%'],
            ],
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
</div></div></div>

</div>
