<?php
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Insentif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="insentif-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
<div class="col-sm-6">
    <?php 
        if(!$model->isNewRecord || $model->isNewRecord){
            if($model->tgl_insentif!=null){
                $model->tgl_insentif=date('d-m-Y',strtotime($model->tgl_insentif));
            }
        }
    ?>
    <?= $form->field($model, 'tgl_insentif')->widget(DatePicker::className(),[
        'clientOptions'=>[
            'autoclose'=>true,
            'format'=>'dd-mm-yyyy',
            'orientation'=>'bottom',
        ]
    ])?>
</div>
<div class="col-sm-6">
    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true,'placeholder'=>'Ex. Insentif Bulan Maret 2022']) ?>
</div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
