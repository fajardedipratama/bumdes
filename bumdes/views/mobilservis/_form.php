<?php
use app\models\Mobil;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\MobilServis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mobil-servis-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
    <div class="col-sm-4">
        <?php 
        if(!$model->isNewRecord || $model->isNewRecord){
            if($model->tgl_servis!=null){
                $model->tgl_servis=date('d-m-Y',strtotime($model->tgl_servis));
            }
        }
        ?>
        <?= $form->field($model, 'tgl_servis')->widget(DatePicker::className(),[
            'clientOptions'=>[
                'autoclose'=>true,
                'format'=>'dd-mm-yyyy',
                'orientation'=>'bottom',
            ]
        ])?>
    </div>
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
        <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'biaya')->textInput(['type'=>'number']) ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>
</div></div>

    <?php ActiveForm::end(); ?>

</div>
