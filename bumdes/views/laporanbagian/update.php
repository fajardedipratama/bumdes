<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanBagian */

$this->title = 'Ubah Data Pembagian Rekap Tahunan';
?>
<div class="laporan-bagian-update">

    <h1>
        <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['laporantahun/view','id'=>$model->tahun_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::encode($this->title) ?>
    </h1>
    <h5><?= $model->keterangan ?></h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
