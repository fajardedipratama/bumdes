<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Bulanan';
?>
<div class="laporan-index">

<div class="row">
<div class="col-sm-9">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<div class="col-sm-3">
    <p>
        <button class="btn btn-success" data-toggle="modal" data-target="#tambah-laporan"><i class="fa fa-fw fa-plus-square"></i> Tambah Data</button>
    </p>
</div>
</div>

<div class="box"><div class="box-body"><div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'bulan',
                'value'=>function($data){
                    if($data->bulan == 1){
                        return 'Januari';
                    }elseif($data->bulan == 2){
                        return 'Februari';
                    }elseif($data->bulan == 3){
                        return 'Maret';
                    }elseif($data->bulan == 4){
                        return 'April';
                    }elseif($data->bulan == 5){
                        return 'Mei';
                    }elseif($data->bulan == 6){
                        return 'Juni';
                    }elseif($data->bulan == 7){
                        return 'Juli';
                    }elseif($data->bulan == 8){
                        return 'Agustus';
                    }elseif($data->bulan == 9){
                        return 'September';
                    }elseif($data->bulan == 10){
                        return 'Oktober';
                    }elseif($data->bulan == 11){
                        return 'November';
                    }elseif($data->bulan == 12){
                        return 'Desember';
                    }
                },
                'filter'=> ['1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'Mei','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember']
            ],
            'tahun',
            [
                'attribute'=>'tgl_awal',
                'header'=>'Periode',
                'value'=>function($data){
                    return date('d/m/Y',strtotime($data->tgl_awal)).' - '.date('d/m/Y',strtotime($data->tgl_akhir));
                }
            ],
            'dana_kemarin',
            'dana_tahun_lalu',
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{print} {update}',
                'buttons' => [
                    'print'=>function($url,$model)
                    {
                        return Html::a
                        (
                          '<span class="glyphicon glyphicon-print"></span>',
                          ["print",'id'=>$model->id],
                          ['title' => Yii::t('app', 'Print'),'target'=>'_blank'],
                        );
                    }
                ]
            ],
        ],
    ]); ?>
</div></div></div>

    <div class="modal fade" id="tambah-laporan"><div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Tambah Laporan</b></h4>          
            </div>
            <div class="modal-body">
              <?= $this->render('_form', ['model' => $model]) ?>
            </div>
        </div>
    </div></div>

</div>
