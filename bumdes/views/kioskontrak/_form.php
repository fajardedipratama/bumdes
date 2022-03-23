<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\KiosKontrak */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kios-kontrak-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
    <div class="col-sm-4">
    <?php 
        if(!$model->isNewRecord || $model->isNewRecord){
            if($model->awal_kontrak!=null){
                $model->awal_kontrak=date('d-m-Y',strtotime($model->awal_kontrak));
            }
        }
    ?>
        <?= $form->field($model, 'awal_kontrak')->widget(DatePicker::className(),[
            'clientOptions'=>[
                'autoclose'=>true,
                'format'=>'dd-mm-yyyy',
                'orientation'=>'bottom',
            ]
        ])?>
    </div>
    <div class="col-sm-4">
    <?php 
        if(!$model->isNewRecord || $model->isNewRecord){
            if($model->akhir_kontrak!=null){
                $model->akhir_kontrak=date('d-m-Y',strtotime($model->akhir_kontrak));
            }
        }
    ?>
        <?= $form->field($model, 'akhir_kontrak')->widget(DatePicker::className(),[
            'clientOptions'=>[
                'autoclose'=>true,
                'format'=>'dd-mm-yyyy',
                'orientation'=>'bottom',
            ]
        ])?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'tagihan')->textInput() ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>
</div></div>
    <?php ActiveForm::end(); ?>

</div>
