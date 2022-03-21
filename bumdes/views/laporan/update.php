<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = 'Ubah Deskripsi Laporan';
?>
<div class="laporan-update">

    <h1>
        <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::encode($this->title) ?>
    </h1>

<div class="box box-warning"><div class="box-body">
    <?= $this->render('_form', ['model' => $model]) ?>
</div></div>

</div>
