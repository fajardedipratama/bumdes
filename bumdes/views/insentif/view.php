<?php
use app\models\LaporanUser;
use app\models\InsentifDetail;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Insentif */

$result = InsentifDetail::find()->where(['insentif_id'=>$model->id])->all();

$this->title = $model->keterangan;
\yii\web\YiiAsset::register($this);
?>
<div class="insentif-view">

<h3>
    <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
    <?= Html::encode($this->title) ?>
</h3>

<?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
    <div class="col-sm-4">
        <?= $form->field($newmodel, 'pengurus_id')->widget(Select2::className(),[
            'data'=>ArrayHelper::map(LaporanUser::find()->all(),'id',
                function($data){
                    return $data['nama'].'-'.$data['jabatan'];
                }
            ),
        ]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($newmodel, 'nominal')->textInput(['type'=>'number','maxlength' => true]) ?>
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
        <th width="50%">Pengurus</th>
        <th width="30%">Jumlah Insentif</th>
        <th width="20%">Aksi</th>
    </tr>
<?php foreach($result as $show): ?>
    <tr>
        <td><?= $show->pengurus->nama.' ('.$show->pengurus->jabatan.')' ?></td>
        <td><?= Yii::$app->formatter->asCurrency($show['nominal']) ?></td>
        <td><?= 
            Html::a('<i class="fa fa-fw fa-pencil"></i> Ubah', ['insentifdetail/update', 'id' => $show->id],['class'=>'btn btn-xs btn-primary']).' '.
            Html::a('<i class="fa fa-fw fa-trash"></i> Hapus',['insentifdetail/delete','id' => $show->id], [
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
