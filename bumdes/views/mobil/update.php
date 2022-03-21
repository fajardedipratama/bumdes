<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mobil */

$this->title = 'Ubah '.$model->merek;
?>
<div class="mobil-update">

    <h1>
        <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::encode($this->title) ?>
    </h1>
    <h5>No.Polisi : <?= $model->nopol ?></h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
