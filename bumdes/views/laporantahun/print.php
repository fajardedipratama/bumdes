<?php 
use yii\helpers\Html;
use app\models\LaporanBagian;
use app\models\Laporan;
use app\models\LaporanUser;


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

$bagian = LaporanBagian::find()->where(['tahun_id'=>$model->id]);
$bulanan = Laporan::find()->where(['tahun'=>$model->tahun])->all();
$total=Laporan::find()->where(['tahun'=>$model->tahun])->orderBy(['bulan'=>SORT_DESC])->limit(1)->one();
$selisih = $total->dana-$bagian->sum('nominal');
//pengurus
$direktur = LaporanUser::find()->where(['id'=>1])->one();
$bendahara = LaporanUser::find()->where(['id'=>2])->one();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Print Rekap Tahunan Bumdes</title>
    <style type="text/css">
        @media Print{
            .pagebreak{
                clear: both;
                page-break-after: always;
            }
            .tombol{
                visibility: hidden;
            }
        }
    </style>
</head>
<body>
<?php if($model->dana == NULL): ?>
<a href="index.php?r=laporantahun/finishreport&id=<?= $model->id ?>&dana=<?= $selisih ?>"><button style="font-size:18px" class="tombol" onclick="return confirm('Apakah anda yakin laporan ini benar ?')">Laporan Benar</button></a>
<?php endif ?>
<button style="font-size:18px" class="tombol" onclick="window.print()">Print Laporan</button>
<h3 style="text-align:center">
    REKAP TAHUNAN BUMDES BINTANG GIRI <br>
    TAHUN <?= $model->tahun ?>
</h3>

<p style="font-weight: bold;">Pembagian Dana</p>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th>Pembagian</th>
        <th>Nominal</th>
    </tr>
<?php foreach($bagian->all() as $show): ?>
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
        <td align="center"><?= Yii::$app->formatter->asCurrency($show->nominal) ?></td>
    </tr>
<?php endforeach ?>
    <tr>
        <th align="left">Total</th>
        <th><?= Yii::$app->formatter->asCurrency($bagian->sum('nominal')) ?></th>
    </tr>
    <tr>
        <th align="left">Sisa</th>
        <th>
        <?= Yii::$app->formatter->asCurrency($selisih); ?>
        </th>
    </tr>
</table>
<br><br>
<table border="0" width="100%" style="text-align:center">
    <tr>
        <td width="50%"></td>
        <td width="50%">Giri, <?= date('d ').bulan(date('m')).date(' Y') ?></td>
    </tr>
    <tr>
        <td><?= $direktur->jabatan ?> <br><br><br><br><br></td>
        <td><?= $bendahara->jabatan ?> <br><br><br><br><br></td>
    </tr>
    <tr>
        <td><?= $direktur->nama ?> </td>
        <td><?= $bendahara->nama ?> </td>
    </tr>
</table>
<div class="pagebreak"></div>
<p style="font-weight: bold;">Rincian</p>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
<?php foreach($bulanan as $show): ?>
    <tr>
        <td><?= bulan($show->bulan) ?></td>
        <td><?= Yii::$app->formatter->asCurrency($show->dana) ?></td>
    </tr>
<?php endforeach ?>
    <tr align="left">
        <th>Dana Akhir Tahun</th>
        <th><?= Yii::$app->formatter->asCurrency($total->dana) ?></th>
    </tr>
</table>

</body>
</html>