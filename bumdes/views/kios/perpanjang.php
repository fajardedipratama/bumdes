<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Kios */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Perpanjang Kios #'.$model->no_kios;

?>

<div class="kios-update">
    <h1>
        <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
        Perpanjang Kios (<?= $model->no_kios.'-'.$model->nama ?>)
    </h1>
    <h5>Akan diperpanjang 365 hari kedepan dihitung sejak batas akhir sewa</h5>

    <?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
    <div class="col-sm-4">
        <?= $form->field($model, 'biaya_sewa')->textInput(['type'=>'number','maxlength' => true]) ?>
    </div>
</div>
</div></div>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
