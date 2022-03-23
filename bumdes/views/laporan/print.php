<?php 
use yii\helpers\Html;
use app\models\Laporan;
use app\models\SetoranKios;
use app\models\SetoranKiosDetail;
use app\models\MobilSewa;
use app\models\Bgmart;
use app\models\Ponten;
use app\models\LainMasuk;
use app\models\MobilServis;
use app\models\LainKeluar;

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
// pemasukan
$kios = SetoranKios::find()->where(['between','tgl_setoran',$model->tgl_awal,$model->tgl_akhir])->all();
$setorkios = SetoranKiosDetail::find()->where(['between','tgl_setoran',$model->tgl_awal,$model->tgl_akhir])->sum('biaya');
$mobil = MobilSewa::find()->where(['between','tgl_selesai',$model->tgl_awal,$model->tgl_akhir]);
$bgmart=Bgmart::find()->where(['between','tgl_setor',$model->tgl_awal,$model->tgl_akhir]);
$ponten=Ponten::find()->where(['between','tgl_setor',$model->tgl_awal,$model->tgl_akhir]);
$lainmasuk=LainMasuk::find()->where(['between','tgl_setor',$model->tgl_awal,$model->tgl_akhir]);
// pengeluaran
$servis = MobilServis::find()->where(['between','tgl_servis',$model->tgl_awal,$model->tgl_akhir]);
$lainkeluar=LainKeluar::find()->where(['between','tgl_setor',$model->tgl_awal,$model->tgl_akhir]);
// total
if($model->dana_kemarin === 'Ya'){
    $dana_lalu = Laporan::find()->where(['bulan'=>$model->bulan-1,'tahun'=>$model->tahun])->one();
    $pemasukan = $dana_lalu->dana+$setorkios+$mobil->sum('biaya')+$bgmart->sum('jumlah')+$ponten->sum('jumlah')+$lainmasuk->sum('jumlah');
}else{
    $pemasukan = $setorkios+$mobil->sum('biaya')+$bgmart->sum('jumlah')+$ponten->sum('jumlah')+$lainmasuk->sum('jumlah');
}
$pengeluaran = $servis->sum('biaya')+$lainkeluar->sum('jumlah');
$selisih = $pemasukan-$pengeluaran;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Print Laporan Keuangan Bumdes</title>
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
<a href="index.php?r=laporan/finishreport&id=<?= $model->id ?>&dana=<?= $selisih ?>"><button style="font-size:18px" class="tombol" onclick="return confirm('Apakah anda yakin laporan ini benar ?')">Laporan Benar</button></a>
<?php endif ?>
<button style="font-size:18px" class="tombol" onclick="window.print()">Print Laporan</button>
<h3 style="text-align:center">
	LAPORAN KEUANGAN BUMDES BINTANG GIRI <br>
	<?= bulan($model->bulan).' '.$model->tahun ?>
</h3>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th>Keterangan</th>
        <th>Uang Masuk</th>
        <th>Uang Keluar</th>
    </tr>
<?php if($model->dana_kemarin === 'Ya'): ?>
    <tr>
        <td width="50%">Setoran Bulan Sebelumnya</td>
        <td width="25%"><?= Yii::$app->formatter->asCurrency($dana_lalu['dana']);?></td>
        <td></td>
    </tr>
<?php endif ?>
    <tr>
        <td width="50%">Setoran Kios Pasar</td>
        <td width="25%"><?= Yii::$app->formatter->asCurrency($setorkios) ?></td>
        <td></td>
    </tr>
    <tr>
        <td width="50%">Setoran Sewa Mobil</td>
        <td width="25%"><?= Yii::$app->formatter->asCurrency($mobil->sum('biaya')) ?></td>
        <td></td>
    </tr>
    <tr>
        <td width="50%">Setoran BGMart</td>
        <td width="25%"><?= Yii::$app->formatter->asCurrency($bgmart->sum('jumlah')) ?></td>
        <td></td>
    </tr>
    <tr>
        <td width="50%">Setoran Ponten Pasar</td>
        <td width="25%"><?= Yii::$app->formatter->asCurrency($ponten->sum('jumlah')) ?></td>
        <td></td>
    </tr>
    <tr>
        <td width="50%">Pemasukan Lainnya</td>
        <td width="25%"><?= Yii::$app->formatter->asCurrency($lainmasuk->sum('jumlah')) ?></td>
        <td></td>
    </tr>
    <tr>
        <td width="50%">Perawatan Mobil</td>
        <td></td>
        <td width="25%"><?= Yii::$app->formatter->asCurrency($servis->sum('biaya')) ?></td>
    </tr>
    <tr>
        <td width="50%">Pengeluaran Lainnya</td>
        <td></td>
        <td width="25%"><?= Yii::$app->formatter->asCurrency($lainkeluar->sum('jumlah')) ?></td>
    </tr>
    <tr>
        <th></th>
        <th align="left"><?= Yii::$app->formatter->asCurrency($pemasukan) ?></th>
        <th align="left"><?= Yii::$app->formatter->asCurrency($pengeluaran) ?></th>
    </tr>
    <tr>
        <th>Total</th>
        <th colspan="2"><?= Yii::$app->formatter->asCurrency($pemasukan-$pengeluaran) ?></th>
    </tr>
</table>

<div class="pagebreak"></div>
<p style="text-align:center;font-weight:bold;">Pemasukan</p>
<!-- setoran kios -->
<p style="font-weight: bold;">Kios Pasar</p>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th width="25%">Tanggal</th>
        <th width="50%">Keterangan</th>
        <th width="25%">Jumlah Uang</th>
    </tr>
<?php foreach($kios as $show): ?>
    <tr>
    	<td><?= date('d/m/Y',strtotime($show->tgl_setoran)) ?></td>
    	<td><?= $show->nama_setoran ?></td>
    	<td>
    		<?php 
    			$biaya=SetoranKiosDetail::find()->where(['setoran_id'=>$show->id])->sum('biaya');
    			echo Yii::$app->formatter->asCurrency($biaya);
    		?>		
    	</td>
    </tr>
<?php endforeach ?>
    <tr>
        <td colspan="2" style="font-weight:bold;text-align: center;">Total</td>
        <td style="font-weight:bold"><?= Yii::$app->formatter->asCurrency($setorkios) ?></td>
    </tr>
</table>
<!-- sewa mobil -->
<p style="font-weight: bold;">Sewa Mobil</p>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th width="25%">Tanggal</th>
        <th width="50%">Keterangan</th>
        <th width="25%">Jumlah Uang</th>
    </tr>
<?php foreach($mobil->all() as $show): ?>
    <tr>
    	<td><?= date('d/m/Y',strtotime($show->tgl_selesai)) ?></td>
    	<td>Setoran Sewa Mobil</td>
    	<td><?= Yii::$app->formatter->asCurrency($show->biaya); ?></td>
    </tr>
<?php endforeach ?>
    <tr>
        <td colspan="2" style="font-weight:bold;text-align: center;">Total</td>
        <td style="font-weight:bold"><?= Yii::$app->formatter->asCurrency($mobil->sum('biaya')) ?></td>
    </tr>
</table>
<!-- bgmart -->
<p style="font-weight: bold;">BGMart</p>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th width="25%">Tanggal</th>
        <th width="50%">Keterangan</th>
        <th width="25%">Jumlah Uang</th>
    </tr>
<?php foreach($bgmart->all() as $show): ?>
    <tr>
        <td><?= date('d/m/Y',strtotime($show->tgl_setor)) ?></td>
        <td><?= $show->nama_setoran ?></td>
        <td><?= Yii::$app->formatter->asCurrency($show->jumlah); ?></td>
    </tr>
<?php endforeach ?>
    <tr>
        <td colspan="2" style="font-weight:bold;text-align: center;">Total</td>
        <td style="font-weight:bold"><?= Yii::$app->formatter->asCurrency($bgmart->sum('jumlah')) ?></td>
    </tr>
</table>
<!-- ponten pasar -->
<p style="font-weight: bold;">Ponten Pasar</p>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th width="25%">Tanggal</th>
        <th width="50%">Keterangan</th>
        <th width="25%">Jumlah Uang</th>
    </tr>
<?php foreach($ponten->all() as $show): ?>
    <tr>
        <td><?= date('d/m/Y',strtotime($show->tgl_setor)) ?></td>
        <td><?= $show->nama_setoran ?></td>
        <td><?= Yii::$app->formatter->asCurrency($show->jumlah); ?></td>
    </tr>
<?php endforeach ?>
    <tr>
        <td colspan="2" style="font-weight:bold;text-align: center;">Total</td>
        <td style="font-weight:bold"><?= Yii::$app->formatter->asCurrency($ponten->sum('jumlah')) ?></td>
    </tr>
</table>
<!-- pemasukan lain -->
<p style="font-weight: bold;">Pemasukan Lainnya</p>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th width="25%">Tanggal</th>
        <th width="50%">Keterangan</th>
        <th width="25%">Jumlah Uang</th>
    </tr>
<?php foreach($lainmasuk->all() as $show): ?>
    <tr>
        <td><?= date('d/m/Y',strtotime($show->tgl_setor)) ?></td>
        <td><?= $show->nama_setoran ?></td>
        <td><?= Yii::$app->formatter->asCurrency($show->jumlah); ?></td>
    </tr>
<?php endforeach ?>
    <tr>
        <td colspan="2" style="font-weight:bold;text-align: center;">Total</td>
        <td style="font-weight:bold"><?= Yii::$app->formatter->asCurrency($lainmasuk->sum('jumlah')) ?></td>
    </tr>
</table>
<div class="pagebreak"></div>
<p style="text-align:center;font-weight:bold;">Pengeluaran</p>
<!-- perawatan mobil -->
<p style="font-weight: bold;">Perawatan Mobil</p>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th width="15%">Tanggal</th>
        <th width="25%">Mobil</th>
        <th width="35%">Keterangan</th>
        <th width="25%">Biaya</th>
    </tr>
<?php foreach($servis->all() as $show): ?>
    <tr>
        <td><?= date('d/m/Y',strtotime($show->tgl_servis)) ?></td>
        <td><?= $show->mobil->merek.' ('.$show->mobil->nopol.')'; ?></td>
        <td><?= $show->keterangan ?></td>
        <td><?= Yii::$app->formatter->asCurrency($show->biaya);?>      
        </td>
    </tr>
<?php endforeach ?>
    <tr>
        <td colspan="3" style="font-weight:bold;text-align: center;">Total</td>
        <td style="font-weight:bold"><?= Yii::$app->formatter->asCurrency($servis->sum('biaya')) ?></td>
    </tr>
</table>
<!-- pengeluaran lain -->
<p style="font-weight: bold;">Pengeluaran Lainnya</p>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th width="25%">Tanggal</th>
        <th width="50%">Keterangan</th>
        <th width="25%">Jumlah Uang</th>
    </tr>
<?php foreach($lainkeluar->all() as $show): ?>
    <tr>
        <td><?= date('d/m/Y',strtotime($show->tgl_setor)) ?></td>
        <td><?= $show->nama_setoran ?></td>
        <td><?= Yii::$app->formatter->asCurrency($show->jumlah); ?></td>
    </tr>
<?php endforeach ?>
    <tr>
        <td colspan="2" style="font-weight:bold;text-align: center;">Total</td>
        <td style="font-weight:bold"><?= Yii::$app->formatter->asCurrency($lainkeluar->sum('jumlah')) ?></td>
    </tr>
</table>
</body>
</html>