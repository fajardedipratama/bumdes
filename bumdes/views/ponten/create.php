<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ponten */

$this->title = 'Tambah Setoran Ponten';
?>
<div class="ponten-create">

    <h1>
        <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::encode($this->title) ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
