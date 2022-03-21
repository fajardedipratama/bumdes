<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SetoranKios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setoran-kios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_setoran')->textInput(['maxlength' => true])->hint("Contoh : Setoran Minggu 2 Bulan Maret 2022") ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
