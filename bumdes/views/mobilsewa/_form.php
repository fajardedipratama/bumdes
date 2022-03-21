<?php
use app\models\Mobil;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\MobilSewa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mobil-sewa-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
    <div class="col-sm-4">
        <?= $form->field($model, 'mobil_id')->widget(Select2::className(),[
            'data'=>ArrayHelper::map(Mobil::find()->where(['status'=>'Aktif'])->all(),'id',
                function($model){
                    return $model['merek'].' ('.$model['nopol'].')';
                }
            ),
            'pluginOptions'=>['allowClear'=>true]
        ]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'no_identitas')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'no_hp')->textInput(['type'=>'number','maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'keperluan')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?php 
        if(!$model->isNewRecord || $model->isNewRecord){
            if($model->tgl_sewa!=null){
                $model->tgl_sewa=date('d-m-Y',strtotime($model->tgl_sewa));
            }
        }
        ?>
        <?= $form->field($model, 'tgl_sewa')->widget(DatePicker::className(),[
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
            if($model->tgl_selesai!=null){
                $model->tgl_selesai=date('d-m-Y',strtotime($model->tgl_selesai));
            }
        }
        ?>
        <?= $form->field($model, 'tgl_selesai')->widget(DatePicker::className(),[
            'clientOptions'=>[
                'autoclose'=>true,
                'format'=>'dd-mm-yyyy',
                'orientation'=>'bottom',
            ]
        ])?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'biaya')->textInput(['type'=>'number']) ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
</div></div>
    <?php ActiveForm::end(); ?>

</div>
