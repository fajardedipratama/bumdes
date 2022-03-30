<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%kios}}".
 *
 * @property int $id
 * @property int|null $no_kios
 * @property string $nama
 * @property string $no_ktp
 * @property string $no_hp
 * @property string $alamat
 * @property string $jenis_dagang
 * @property string|null $awal_sewa
 * @property string|null $akhir_sewa
 * @property int|null $biaya_sewa
 */
class Kios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%kios}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_kios','biaya_sewa'], 'integer'],
            [['nama', 'no_ktp', 'no_hp', 'alamat', 'jenis_dagang'], 'required'],
            [['awal_sewa','akhir_sewa'],'safe'],
            [['nama', 'no_ktp', 'no_hp', 'jenis_dagang'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_kios' => 'No.Kios',
            'nama' => 'Nama Penyewa',
            'no_ktp' => 'No.KTP',
            'no_hp' => 'No.HP',
            'alamat' => 'Alamat Penyewa',
            'jenis_dagang' => 'Jenis Dagang',
            'awal_sewa' => 'Tanggal Awal Sewa',
            'akhir_sewa' => 'Tanggal Selesai Sewa',
            'biaya_sewa' => 'Biaya Sewa',
        ];
    }
}
