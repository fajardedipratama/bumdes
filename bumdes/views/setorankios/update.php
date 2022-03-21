<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SetoranKios */

$this->title = 'Ubah Data';
?>
<div class="setoran-kios-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <h5><?= $model->nama_setoran ?></h5>

    <?= $this->render('_formupdate', [
        'model' => $model,
    ]) ?>

</div>
