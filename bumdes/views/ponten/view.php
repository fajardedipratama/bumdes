<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ponten */

$this->title = $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="ponten-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tgl_setor',
            'nama_setoran',
            'jumlah',
        ],
    ]) ?>

</div>
