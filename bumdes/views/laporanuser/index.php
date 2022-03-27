<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LaporanuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengurus Bumdes';
?>
<div class="laporan-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
<div class="box"><div class="box-body"><div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nama',
            'jabatan',
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{update}',
            ],
        ],
    ]); ?>
</div></div></div>

</div>
