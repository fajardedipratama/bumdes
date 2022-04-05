<?php
use app\models\LaporanUser;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\InsentifDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="insentif-detail-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
<div class="col-sm-4">
    <?= $form->field($model, 'pengurus_id')->widget(Select2::className(),[
        'data'=>ArrayHelper::map(LaporanUser::find()->all(),'id',
            function($data){
                return $data['nama'].'-'.$data['jabatan'];
            }
        ),
    ]) ?>
</div>
<div class="col-sm-4">
    <?= $form->field($model, 'nominal')->textInput() ?>
</div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
