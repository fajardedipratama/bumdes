<?php
use app\models\MobilSewa;
use app\models\MobilServis;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mobil */

$this->title = $model->merek;
\yii\web\YiiAsset::register($this);
?>
<div class="mobil-view">
<div class="row">
<div class="col-sm-8">
    <h1>
        <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::encode($this->title) ?>
    </h1>
</div>
<div class="col-sm-4">
    <p>
    <?php if($model->status==='Aktif'): ?>
        <?= Html::a('<i class="fa fa-fw fa-pencil"></i> Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-fw fa-ban"></i> Nonaktifkan', ['nonaktifkan', 'id' => $model->id], ['class' => 'btn btn-warning',
            'data' => [
                'confirm' => 'Nonaktifkan mobil ?',
                'method' => 'post',
            ],
        ]) ?>
    <?php 
        $cek_sewa = MobilSewa::find()->where(['mobil_id'=>$model->id])->count();
        $cek_servis = MobilServis::find()->where(['mobil_id'=>$model->id])->count();
        if($cek_sewa < 1 && $cek_servis < 1):
    ?>
        <?= Html::a('<i class="fa fa-fw fa-trash"></i> Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    <?php endif ?>
    <?php endif ?>
    </p>
</div>
</div>

<div class="box box-warning"><div class="box-body"><div class="table-responsive">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'merek',
            'nama_pemilik',
            'nopol',
            'no_rangka',
            'no_mesin',
            'tahun',
            'warna',
        ],
    ]) ?>
</div></div></div>

</div>
