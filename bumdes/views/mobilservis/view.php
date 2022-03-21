<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MobilServis */

$this->title = $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="mobil-servis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tgl_servis',
            'mobil_id',
            'keterangan',
            'biaya',
        ],
    ]) ?>

</div>
