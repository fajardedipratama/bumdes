<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\LaporanBagian;
use app\models\Laporan;
/* @var $this yii\web\View */
/* @var $model app\models\LaporanTahun */

$bagian = LaporanBagian::find()->where(['tahun_id'=>$model->id])->all();
$bulanan = Laporan::find()->where(['tahun'=>$model->tahun])->all();
$total = Laporan::find()->where(['tahun'=>$model->tahun])->orderBy(['bulan'=>SORT_DESC])->limit(1)->one(); 

$this->title = 'Rekap Tahunan '.$model->tahun;
\yii\web\YiiAsset::register($this);
?>
<div class="laporan-tahun-view">
<div class="row">
    <div class="col-sm-9">
        <h3>
            <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::encode($this->title) ?>
        </h3>
    </div>
    <div class="col-sm-3"></div>
        <p>
            <?= Html::a('<i class="fa fa-fw fa-print"></i> Cetak', ['print', 'id' => $model->id], ['class' => 'btn btn-success','target'=>'_blank']) ?>
        </p>
    </div>
</div>

<?php $form = ActiveForm::begin(); ?>
<div class="box box-warning"><div class="box-body">
<div class="row">
    <div class="col-sm-4">
        <?= $form->field($modelform, 'keterangan')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($modelform,'nilai')->textInput(['type'=>'number','maxlength'=>true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($modelform,'jenis')->dropDownList(['Persentase'=>'Persentase','Nominal'=>'Nominal']) ?>
    </div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>
</div></div>
<?php ActiveForm::end(); ?>

<div class="row">
    <div class="col-sm-8">
        <div class="box box-warning"><div class="box-body">
        <table class="table table-hover table-bordered">
            <tr>
                <th width="30%">Pembagian</th>
                <th width="20%">Nilai</th>
                <th width="10%">Aksi</th>
            </tr>
        <?php foreach($bagian as $show): ?>
            <tr>
                <td>
                <?php
                    if($show->jenis === 'Persentase'){
                        echo $show->keterangan.' ('.$show->nilai.'%)'; 
                    }else{
                        echo $show->keterangan;
                    }
                ?>
                </td>
                <td><?= Yii::$app->formatter->asCurrency($show->nominal) ?></td>
                <td>
                    <?= Html::a('<i class="fa fa-fw fa-pencil"></i> Ubah', ['laporanbagian/update', 'id' => $show->id],['class'=>'btn btn-xs btn-primary']) ?>
                </td>
            </tr>   
        <?php endforeach ?>
        </table>
        </div></div>
    </div>
    <div class="col-sm-4">
        <div class="box box-warning"><div class="box-body">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Bulan</th>
                    <th>Dana</th>
                </tr>
                <?php foreach($bulanan as $show): ?>
                <tr>
                    <td><?= date('F',mktime(0,0,0,$show->bulan,10)) ?></td>
                    <td><?= Yii::$app->formatter->asCurrency($show->dana) ?></td>
                </tr>
                <?php endforeach ?>
                <tr>
                    <th>Dana Terakhir</th>
                    <th><?= Yii::$app->formatter->asCurrency($total->dana);?></th>
                </tr>
            </table>
        </div></div>
    </div>
</div>

</div>
