<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MobilSewa */

$this->title = 'Detail Sewa Mobil';
\yii\web\YiiAsset::register($this);
?>
<div class="mobil-sewa-view">
<div class="row">
<div class="col-sm-8">
    <h1>
        <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::encode($this->title) ?>
    </h1>
</div>
<div class="col-sm-4">
    <p>
        <?= Html::a('<i class="fa fa-fw fa-pencil"></i> Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-fw fa-trash"></i> Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
</div>

<div class="box box-warning"><div class="box-body"><div class="table-responsive">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
            'no_identitas',
            'alamat',
            'no_hp',
            'keperluan',
            [
                'attribute'=>'mobil_id',
                'value'=>$model->mobil->merek.' ('.$model->mobil->nopol.')',
            ],
            [
                'attribute'=>'tgl_sewa',
                'format'=>['date','dd-MM-Y'],
            ],
            [
                'attribute'=>'tgl_selesai',
                'format'=>['date','dd-MM-Y'],
            ],
            [
                'attribute'=>'biaya',
                'format'=>['currency','Rp. '],
            ],
        ],
    ]) ?>
</div></div></div>

</div>
