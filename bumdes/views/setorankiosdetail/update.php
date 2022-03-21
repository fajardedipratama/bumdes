<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SetoranKiosDetail */

$this->title = 'Ubah Data';
?>
<div class="setoran-kios-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <h5><?= $model->setoran->nama_setoran ?></h5>
    <h5>Kios : <?= $model->kios->no_kios.'-'.$model->kios->nama ?></h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
