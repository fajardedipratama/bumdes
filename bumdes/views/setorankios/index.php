<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use app\models\SetoranKiosDetail;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SetorankiosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembayaran';
?>
<div class="setoran-kios-index">

<div class="row">
    <div class="col-sm-9">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="col-sm-3">
        <p>
            <button class="btn btn-success" data-toggle="modal" data-target="#tambah-setoran"><i class="fa fa-fw fa-plus-square"></i> Tambah Data</button>
        </p>  
    </div>
</div>

<div class="box"><div class="box-body"><div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'tgl_setoran',
                'format' => ['date','dd-MM-Y'],
                'headerOptions'=>['style'=>'width:20%'],
                'filter'=> DatePicker::widget([
                    'model'=>$searchModel,'attribute'=>'tgl_setoran','clientOptions'=>[
                      'autoclose'=>true, 'format' => 'dd-mm-yyyy','orientation'=>'bottom'
                    ],
                ]),
            ],
            'nama_setoran',
            [
                'header'=>'Jumlah Setoran',
                'value'=>function($data){
                    $result = SetoranKiosDetail::find()->where(['setoran_id'=>$data->id])->sum('biaya');
                    return Yii::$app->formatter->asCurrency($result);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{update} {view} {delete}',
                'buttons' => 
                [
                    'delete'=>function($url,$model){
                        $check = SetoranKiosDetail::find()->where(['setoran_id'=>$model->id])->count();
                        if($check < 1){
                            return Html::a('<i class="fa fa-fw fa-trash"></i>', ['delete', 'id' => $model->id], [
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    }
                ],
            ],
        ],
    ]); ?>
</div></div></div>

    <div class="modal fade" id="tambah-setoran"><div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Tambah Setoran</b></h4>          
            </div>
            <div class="modal-body">
              <?= $this->render('_form', ['model' => $model]) ?>
            </div>
        </div>
    </div></div>

</div>
