<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\LaporanBagian;
use app\models\Laporan;
/* @var $this yii\web\View */
/* @var $model app\models\LaporanTahun */

function bulan($data){
    if($data == 1){
        return 'Januari';
    }elseif($data == 2){
        return 'Februari';
    }elseif($data == 3){
        return 'Maret';
    }elseif($data == 4){
        return 'April';
    }elseif($data == 5){
        return 'Mei';
    }elseif($data == 6){
        return 'Juni';
    }elseif($data == 7){
        return 'Juli';
    }elseif($data == 8){
        return 'Agustus';
    }elseif($data == 9){
        return 'September';
    }elseif($data == 10){
        return 'Oktober';
    }elseif($data == 11){
        return 'November';
    }elseif($data == 12){
        return 'Desember';
    }
}

$bagian = LaporanBagian::find()->where(['tahun_id'=>$model->id])->all();
$bulanan = Laporan::find()->where(['tahun'=>$model->tahun])->all();
$total=Laporan::find()->where(['tahun'=>$model->tahun])->orderBy(['bulan'=>SORT_DESC])->limit(1)->one(); 

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
                <td><?php 
                    if($show->jenis === 'Persentase'){
                        $cek=($total->dana*$show->nilai)/100;
                        if($cek != $show->nominal){
                            echo Html::a('<i class="fa fa-fw fa-refresh"></i> Perbaiki', ['laporanbagian/kalkulasi', 'id' => $show->id],['class'=>'btn btn-xs btn-danger']);
                        }else{
                            echo Yii::$app->formatter->asCurrency($show->nominal);
                        }
                    }else{
                        echo Yii::$app->formatter->asCurrency($show->nominal);
                    }
                ?></td>
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
                    <td><?= bulan($show->bulan) ?></td>
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
