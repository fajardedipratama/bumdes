<?php
use app\models\Kios;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\SetoranKiosDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setoran-kios-detail-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
  <div class="col-sm-4">
    <?= $form->field($model, 'kios_id')->widget(Select2::className(),[
        'data'=>ArrayHelper::map(Kios::find()->where(['>=','akhir_sewa',date('Y-m-d')])->all(),'id',
            function($model){
                return $model['no_kios'].'-'.$model['nama'];
            }
        ),
        'options'=>['placeholder'=>"Kios"],'pluginOptions'=>['allowClear'=>true]
    ]) ?>
  </div>
  <div class="col-sm-4">
    <?= $form->field($model, 'biaya')->textInput(['type'=>'number','maxlength' => true]) ?>
  </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>
</div></div>
    <?php ActiveForm::end(); ?>

</div>
