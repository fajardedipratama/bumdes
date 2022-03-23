<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
<div class="col-sm-6">
    <?= $form->field($model, 'bulan')->dropDownList(['1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'Mei','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember']) ?>
</div>
<div class="col-sm-6">
    <?= $form->field($model, 'tahun')->textInput() ?>
</div>
<div class="col-sm-6">
    <?php 
        if(!$model->isNewRecord || $model->isNewRecord){
            if($model->tgl_awal!=null){
                $model->tgl_awal=date('d-m-Y',strtotime($model->tgl_awal));
            }
        }
    ?>
    <?= $form->field($model, 'tgl_awal')->widget(DatePicker::className(),[
        'clientOptions'=>[
            'autoclose'=>true,
            'format'=>'dd-mm-yyyy',
            'orientation'=>'bottom',
        ]
    ])?>
</div>
<div class="col-sm-6">
    <?php 
        if(!$model->isNewRecord || $model->isNewRecord){
            if($model->tgl_akhir!=null){
                $model->tgl_akhir=date('d-m-Y',strtotime($model->tgl_akhir));
            }
        }
    ?>
    <?= $form->field($model, 'tgl_akhir')->widget(DatePicker::className(),[
        'clientOptions'=>[
            'autoclose'=>true,
            'format'=>'dd-mm-yyyy',
            'orientation'=>'bottom',
        ]
    ])?>
</div>
<div class="col-sm-6">
    <?= $form->field($model, 'dana_kemarin')->dropDownList(['Ya'=>'Ya','Tidak'=>'Tidak']); ?>
</div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
