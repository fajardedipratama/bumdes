<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\KioskontrakSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kios-kontrak-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kios_id') ?>

    <?= $form->field($model, 'awal_kontrak') ?>

    <?= $form->field($model, 'akhir_kontrak') ?>

    <?= $form->field($model, 'tagihan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
