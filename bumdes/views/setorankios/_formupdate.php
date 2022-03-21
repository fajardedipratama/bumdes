<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SetoranKios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setoran-kios-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
  <div class="col-sm-4">
    <?php 
        if(!$model->isNewRecord || $model->isNewRecord){
            if($model->tgl_setoran!=null){
                $model->tgl_setoran=date('d-m-Y',strtotime($model->tgl_setoran));
            }
        }
    ?>
        <?= $form->field($model, 'tgl_setoran')->widget(DatePicker::className(),[
            'clientOptions'=>[
                'autoclose'=>true,
                'format'=>'dd-mm-yyyy',
                'orientation'=>'bottom',
            ]
        ])?>
  </div>
  <div class="col-sm-4">
    <?= $form->field($model, 'nama_setoran')->textInput(['maxlength' => true])->hint("Contoh : Setoran Minggu 2 Bulan Maret 2022") ?>
  </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>
</div></div>
    <?php ActiveForm::end(); ?>

</div>
