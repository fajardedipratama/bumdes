<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Ponten */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ponten-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
    <div class="col-sm-4">
        <?php 
            if(!$model->isNewRecord || $model->isNewRecord){
                if($model->tgl_setor!=null){
                    $model->tgl_setor=date('d-m-Y',strtotime($model->tgl_setor));
                }
            }
        ?>
        <?= $form->field($model, 'tgl_setor')->widget(DatePicker::className(),[
            'clientOptions'=>[
                'autoclose'=>true,
                'format'=>'dd-mm-yyyy',
                'orientation'=>'bottom',
            ]
        ])?>
    </div>
    <div class="col-sm-4">
    <?php if($model->isNewRecord): ?>
        <?= $form->field($model, 'nama_setoran')->textInput(['maxlength' => true,'value'=>'Setoran uang ponten pasar']) ?>
    <?php else: ?>
        <?= $form->field($model, 'nama_setoran')->textInput(['maxlength' => true]) ?>
    <?php endif ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'jumlah')->textInput(['type'=>'number']) ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>
</div></div>
    <?php ActiveForm::end(); ?>

</div>
