<?php
use app\models\Kios;
use app\models\SetoranKiosDetail;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\SetoranKios */

$result = SetoranKiosDetail::find()->where(['setoran_id'=>$viewmodel->id])->all();

$this->title = $viewmodel->nama_setoran;
\yii\web\YiiAsset::register($this);
?>
<div class="setoran-kios-view">

<h3>
    <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
    <?= Html::encode($this->title) ?>
</h3>

<?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
    <div class="col-sm-4">
        <?= $form->field($model, 'kios_id')->widget(Select2::className(),[
            'data'=>ArrayHelper::map(Kios::find()->where(['>=','akhir_sewa',date('Y-m-d')])->all(),'id',
                function($model){
                    return $model['no_kios'].'-'.$model['nama'];
                }
            ),
            'options'=>['placeholder'=>"Kios"],'pluginOptions'=>['allowClear'=>true]
        ]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'biaya')->textInput(['type'=>'number','maxlength' => true]) ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>
</div></div>
<?php ActiveForm::end(); ?>

<div class="box box-warning"><div class="box-body">
<table class="table table-hover table-bordered">
    <tr>
        <th width="5%">#</th>
        <th width="50%">Kios</th>
        <th width="30%">Setoran</th>
        <th width="15%">Aksi</th>
    </tr>
<?php
    $i = 1; 
    foreach($result as $show): 
?>
<?php 
    $kios = Kios::find()->where(['id'=>$show['kios_id']])->one();
?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $kios['no_kios'].' - '.$kios['nama'] ?></td>
        <td><?= Yii::$app->formatter->asCurrency($show['biaya']) ?></td>
        <td><?= 
            Html::a('<i class="fa fa-fw fa-pencil"></i> Ubah', ['setorankiosdetail/update', 'id' => $show->id],['class'=>'btn btn-xs btn-primary']).' '.
            Html::a('<i class="fa fa-fw fa-trash"></i> Hapus',['setorankiosdetail/delete','id' => $show->id], [
                        'class'=>'btn btn-xs btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]);
        ?></td>
    </tr>
<?php endforeach ?>
</table>
</div></div>

</div>
