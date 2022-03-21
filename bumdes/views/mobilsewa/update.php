<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MobilSewa */

$this->title = 'Ubah Data Sewa Mobil';
?>
<div class="mobil-sewa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
