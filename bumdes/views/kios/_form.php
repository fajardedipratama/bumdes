<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Kios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kios-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
    <div class="col-sm-4">  
        <?= $form->field($model, 'no_kios')->textInput() ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'alamat')->textarea(['style' => 'resize:none','rows' => 3]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'jenis_dagang')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
    <?php 
        if(!$model->isNewRecord || $model->isNewRecord){
            if($model->awal_sewa!=null){
                $model->awal_sewa=date('d-m-Y',strtotime($model->awal_sewa));
            }
        }
    ?>
        <?= $form->field($model, 'awal_sewa')->widget(DatePicker::className(),[
            'clientOptions'=>[
                'autoclose'=>true,
                'format'=>'dd-mm-yyyy',
                'orientation'=>'bottom',
            ]
        ])?>
    </div>
<?php if(!$model->isNewRecord): ?>
    <div class="col-sm-4">
    <?php 
        if(!$model->isNewRecord || $model->isNewRecord){
            if($model->akhir_sewa!=null){
                $model->akhir_sewa=date('d-m-Y',strtotime($model->akhir_sewa));
            }
        }
    ?>
        <?= $form->field($model, 'akhir_sewa')->widget(DatePicker::className(),[
            'clientOptions'=>[
                'autoclose'=>true,
                'format'=>'dd-mm-yyyy',
                'orientation'=>'bottom',
            ]
        ])?>
    </div>
<?php endif ?>
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
