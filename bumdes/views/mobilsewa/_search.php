<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\MobilsewaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mobil-sewa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mobil_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'no_identitas') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'no_hp') ?>

    <?php // echo $form->field($model, 'keperluan') ?>

    <?php // echo $form->field($model, 'tgl_sewa') ?>

    <?php // echo $form->field($model, 'tgl_selesai') ?>

    <?php // echo $form->field($model, 'biaya') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
