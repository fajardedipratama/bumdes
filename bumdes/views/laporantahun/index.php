<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LaporantahunSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekap Tahunan';
?>
<div class="laporan-tahun-index">

<div class="row">
<div class="col-sm-9">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<div class="col-sm-3">
    <p>
        <button class="btn btn-success" data-toggle="modal" data-target="#tambah-rekap"><i class="fa fa-fw fa-plus-square"></i> Tambah Data</button>
    </p>
</div>
</div>

<div class="box"><div class="box-body"><div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'tahun',
            [
                'attribute'=>'dana',
                'format'=>['currency','Rp. '],
            ],
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>
</div></div></div>

    <div class="modal fade" id="tambah-rekap"><div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Tambah Rekap Tahunan</b></h4>          
            </div>
            <div class="modal-body">
            <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                </div>
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div></div>

</div>
