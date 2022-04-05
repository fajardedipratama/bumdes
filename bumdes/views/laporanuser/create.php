<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanUser */

$this->title = 'Tambah Pengurus Bumdes';
?>
<div class="laporan-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
