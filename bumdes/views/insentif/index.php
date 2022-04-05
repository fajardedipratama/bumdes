<?php
use app\models\InsentifDetail;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\InsentifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Insentif';
?>
<div class="insentif-index">

<div class="row">
    <div class="col-sm-9">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="col-sm-3">
        <p>
            <button class="btn btn-success" data-toggle="modal" data-target="#tambah-insentif"><i class="fa fa-fw fa-plus-square"></i> Tambah Data</button>
        </p>  
    </div>
</div>
<div class="box"><div class="box-body"><div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'tgl_insentif',
                'headerOptions'=>['width'=>'20%'],
                'format'=>['date','dd-MM-Y'],
                'filter'=> DatePicker::widget([
                    'model'=>$searchModel,'attribute'=>'tgl_insentif','clientOptions'=>[
                      'autoclose'=>true, 'format' => 'dd-mm-yyyy','orientation'=>'bottom'
                    ],
                ]),
            ],
            'keterangan',
            [
                'header'=>'Nominal',
                'headerOptions'=>['width'=>'30%'],
                'value'=>function($data){
                    $result = InsentifDetail::find()->where(['insentif_id'=>$data->id])->sum('nominal');
                    return Yii::$app->formatter->asCurrency($result);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{update} {view}',
            ],
        ],
    ]); ?>
</div></div></div>

    <div class="modal fade" id="tambah-insentif"><div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Tambah Insentif</b></h4>          
            </div>
            <div class="modal-body">
              <?= $this->render('_form', ['model' => $model]) ?>
            </div>
        </div>
    </div></div>

</div>
