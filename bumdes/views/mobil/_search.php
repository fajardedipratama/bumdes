<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\MobilSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mobil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'merek') ?>

    <?= $form->field($model, 'nama_pemilik') ?>

    <?= $form->field($model, 'nopol') ?>

    <?= $form->field($model, 'no_rangka') ?>

    <?php // echo $form->field($model, 'no_mesin') ?>

    <?php // echo $form->field($model, 'tahun') ?>

    <?php // echo $form->field($model, 'warna') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
