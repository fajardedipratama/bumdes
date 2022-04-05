<?php
use app\models\KiosKontrak;
use app\models\SetoranKiosDetail;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Kios */

$kontrak = KiosKontrak::find()->where(['kios_id'=>$model->id])->orderBy(['akhir_kontrak'=>SORT_DESC]);

$this->title = 'Kios #'.$model->no_kios;
\yii\web\YiiAsset::register($this);
?>
<div class="kios-view">
<div class="row">
    <div class="col-sm-8">
        <h1>
            <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::encode($this->title) ?>
        </h1>
    </div>
    <div class="col-sm-4">
        <p>
        <?php if($model->akhir_sewa >= date('Y-m-d')): ?>
            <?= Html::a('<i class="fa fa-fw fa-pencil"></i> Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-fw fa-calendar"></i> Perpanjang', ['perpanjang', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            <button class="btn btn-warning" data-toggle="modal" data-target="#nonaktif-kios"><i class="fa fa-fw fa-ban"></i> Nonaktifkan</button>
        <?php endif; ?>
        </p>  
    </div>
</div>

<div class="box box-warning"><div class="box-body"><div class="table-responsive">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_kios',
            'nama',
            'no_ktp',
            'no_hp',
            'alamat',
            'jenis_dagang',
            [
                'attribute'=>'awal_sewa',
                'label'=>'Awal Sewa',
                'value'=>function($data){
                    return date('d/m/Y',strtotime($data->awal_sewa));
                },
            ],
            [
                'attribute'=>'akhir_sewa',
                'label'=>'Akhir Sewa',
                'value'=>function($data){
                    return date('d/m/Y',strtotime($data->akhir_sewa));
                },
            ],
        ],
    ]) ?>
</div></div></div>

<h4>Riwayat Kontrak</h4>
<div class="box box-warning"><div class="box-body">
<table class="table table-hover table-bordered">
    <tr>
        <th width="20%">Awal Kontrak</th>
        <th width="20%">Akhir Kontrak</th>
        <th width="20%">Biaya Sewa</th>
        <th width="20%">Terbayar</th>
        <th width="10%">Aksi</th>
    </tr>
<?php foreach($kontrak->all() as $show): ?>
<?php $terbayar=SetoranKiosDetail::find()->where(['BETWEEN','tgl_setoran',$show->awal_kontrak,$show->akhir_kontrak])->andWhere(['kios_id'=>$model->id])->sum('biaya'); ?>
    <tr>
        <td><?= date('d/m/Y',strtotime($show->awal_kontrak)) ?></td>
        <td><?= date('d/m/Y',strtotime($show->akhir_kontrak)) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($show->tagihan) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($terbayar) ?></td>
        <td>
        <?php $cek=$kontrak->limit(1)->one(); ?>
            <?php 
                if($cek->id === $show->id){
                    echo Html::a('<i class="fa fa-fw fa-pencil"></i> Ubah', ['kioskontrak/update', 'id' => $show->id],['class'=>'btn btn-xs btn-primary']); 
                }
            ?>
        </td>
    </tr>
<?php endforeach ?>
</table>
</div></div>

    <div class="modal fade" id="nonaktif-kios"><div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Nonaktifkan Kios</b></h4>          
            </div>
            <div class="modal-body">
            <?php $form = ActiveForm::begin(); ?>
            <?php 
                if(!$model->isNewRecord || $model->isNewRecord){
                    if($model->akhir_sewa!=null){
                        $model->akhir_sewa=date('d-m-Y',strtotime($model->akhir_sewa));
                    }
                }
            ?>
            <?= $form->field($model, 'akhir_sewa')->widget(DatePicker::className(),[
                'clientOptions'=>[
                    'autoclose'=>true,
                    'format'=>'dd-mm-yyyy',
                    'orientation'=>'bottom',
                ]
            ])?>
            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div></div>

</div>
