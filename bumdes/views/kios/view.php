<?php
use app\models\SetoranKiosDetail;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Kios */

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
            <button class="btn btn-warning" data-toggle="modal" data-target="#nonaktif-kios"><i class="fa fa-fw fa-ban"></i> Nonaktifkan</button>
        <?php 
            $check = SetoranKiosDetail::find()->where(['kios_id'=>$model->id])->count();
            if($check < 1):
        ?>
            <?= Html::a('<i class="fa fa-fw fa-trash"></i> Hapus', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif ?>
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
                'attribute'=>'akhir_sewa',
                'label'=>'Awal-Akhir Sewa',
                'value'=>function($data){
                    return date('d/m/Y',strtotime($data->awal_sewa)).' - '.date('d/m/Y',strtotime($data->akhir_sewa));
                },
            ],
            [
                'attribute'=>'biaya_sewa',
                'value'=>function($data){
                    return Yii::$app->formatter->asCurrency($data->biaya_sewa);
                }
            ],
        ],
    ]) ?>
</div></div></div>

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
