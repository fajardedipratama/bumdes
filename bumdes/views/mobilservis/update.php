<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MobilServis */

$this->title = 'Ubah Data Perawatan';
?>
<div class="mobil-servis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
