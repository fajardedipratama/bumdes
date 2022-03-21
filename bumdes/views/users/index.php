<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data User';
?>
<div class="users-index">
<div class="row">
    <div class="col-sm-10">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="col-sm-2">
        <p>
            <?= Html::a('<i class="fa fa-fw fa-plus-square"></i> Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
        </p>  
    </div>
</div>

<div class="box"><div class="box-body"><div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'profilname',
            'username',
            [
                'class' => 'yii\grid\ActionColumn','header'=>'Aksi',
                'template' => '{update}',
            ],
        ],
    ]); ?>
</div></div></div>

</div>
