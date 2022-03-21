<?php
use app\models\Kios;
use app\models\SetoranKiosDetail;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SetorankiosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$result_aktif = Kios::find()->all();

$this->title = 'Laporan Kios '.$_GET['tahun'];
?>
<div class="setoran-kios-index">

<h1>
    <?= Html::a('<i class="fa fa-fw fa-chevron-left"></i> Back', ['index'], ['class' => 'btn btn-warning']) ?>
    <?= Html::encode($this->title) ?>        
</h1>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-2">
        <?= $form->field($model, 'tahun')->textInput(['placeholder'=>"Tahun",'type'=>'number','maxlength' => true])->label(false) ?>
    </div>
    <div class="col-sm-2">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

<div class="box box-warning"><div class="box-body"><div class="table-responsive">
    <table class="table table-hover table-bordered">
        <tr>
            <th width="10%">No.Kios</th>
            <th width="30%">Penyewa</th>
            <th width="20%">Biaya Sewa</th>
            <th width="20%">Terbayar</th>
        </tr>

    <?php foreach($result_aktif as $show): ?>
    <?php if($show->tahun_awal <= $_GET['tahun'] && ($show->tahun_akhir >= $_GET['tahun'] || $show->tahun_akhir==NULL)): ?>
    <?php 
        $biaya_sewa = SetoranKiosDetail::find()->where(['kios_id'=>$show->id])->andWhere(['like','tgl_setoran',$_GET['tahun']])->orderBy(['id'=>SORT_DESC])->one(); 
        $terbayar = SetoranKiosDetail::find()->where(['kios_id'=>$show->id])->andWhere(['like','tgl_setoran',$_GET['tahun']])->sum('biaya');
    ?>
        <tr>
            <td><?= $show->no_kios ?></td>
            <td><?= $show->nama ?></td>
            <td><?php 
            if($biaya_sewa){
                echo Yii::$app->formatter->asCurrency($biaya_sewa->tagihan);
            }
            ?></td>
            <td><?= Yii::$app->formatter->asCurrency($terbayar); ?></td>
        </tr>
    <?php endif ?>
    <?php endforeach ?>

    </table>
</div></div></div>

</div>
