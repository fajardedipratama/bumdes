<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InsentifDetail */

$this->title = 'Ubah Data';
?>
<div class="insentif-detail-update">

    <h1>
        <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['insentif/view','id'=>$model->insentif_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::encode($this->title) ?>
    </h1>

<div class="box box-warning"><div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div></div>

</div>
