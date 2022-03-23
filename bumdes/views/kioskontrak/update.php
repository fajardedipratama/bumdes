<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KiosKontrak */

$this->title = 'Update Data';
?>
<div class="kios-kontrak-update">

    <h1>
        <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['kios/view','id'=>$model->kios_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::encode($this->title) ?>
    </h1>
    <h5>Kios : <?= $model->kios->no_kios.'-'.$model->kios->nama ?></h5>
    <h5>Kontrak : <?= date('d/m/Y',strtotime($model->awal_kontrak)).' - '.date('d/m/Y',strtotime($model->akhir_kontrak)) ?></h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
