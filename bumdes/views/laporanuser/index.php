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

<div class="row">
<div class="col-sm-9">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<div class="col-sm-3">
    <p>
        <?= Html::a('<i class="fa fa-fw fa-plus-square"></i> Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
</div>

<div class="box"><div class="box-body"><div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nama',
            'jabatan',
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{update} {delete}',
                'buttons' => 
                [
                    'delete'=>function($url,$model){
                        if($model->id > 2){
                            return Html::a('<i class="fa fa-fw fa-trash"></i>', ['delete', 'id' => $model->id], [
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    }
                ],
            ],
        ],
    ]); ?>
</div></div></div>

</div>
