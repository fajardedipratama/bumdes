<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LainMasuk */

$this->title = 'Ubah Data Pemasukan';
?>
<div class="lain-masuk-update">

    <h1>
        <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::encode($this->title) ?>
    </h1>
    <h4><?= $model->nama_setoran ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
