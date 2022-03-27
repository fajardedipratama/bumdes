<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanBagian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-bagian-form">

<?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
    <div class="col-sm-4">
        <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model,'nilai')->textInput(['type'=>'number','maxlength'=>true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model,'jenis')->dropDownList(['Persentase'=>'Persentase','Nominal'=>'Nominal']) ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>
</div></div>
<?php ActiveForm::end(); ?>

</div>
