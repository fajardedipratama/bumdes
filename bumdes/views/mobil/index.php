<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MobilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Mobil';
?>
<div class="mobil-index">

<div class="row">
<div class="col-sm-8">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<div class="col-sm-4">
    <p>
        <?= Html::a('<i class="fa fa-fw fa-plus-square"></i> Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-fw fa-book"></i> Mobil Nonaktif', ['nonaktif'], ['class' => 'btn btn-danger']) ?>
    </p>
</div>
</div>

<div class="box"><div class="box-body"><div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'merek',
            'nopol',
            'tahun',
            'nama_pemilik',
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div></div></div>

</div>
