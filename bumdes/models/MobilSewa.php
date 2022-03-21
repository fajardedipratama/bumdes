<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mobil_sewa}}".
 *
 * @property int $id
 * @property int|null $mobil_id
 * @property string $nama
 * @property string $no_identitas
 * @property string $alamat
 * @property string $no_hp
 * @property string $keperluan
 * @property string|null $tgl_sewa
 * @property string|null $tgl_selesai
 * @property int|null $biaya
 */
class MobilSewa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%mobil_sewa}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mobil_id', 'biaya'], 'integer'],
            [['nama', 'no_identitas', 'alamat', 'no_hp', 'keperluan'], 'required'],
            [['tgl_sewa', 'tgl_selesai'], 'safe'],
            [['nama', 'no_identitas', 'no_hp', 'keperluan'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobil_id' => 'Mobil',
            'nama' => 'Nama Penyewa',
            'no_identitas' => 'No.KTP/SIM',
            'alamat' => 'Alamat Penyewa',
            'no_hp' => 'No.HP',
            'keperluan' => 'Keperluan Sewa',
            'tgl_sewa' => 'Tanggal Sewa',
            'tgl_selesai' => 'Tanggal Selesai',
            'biaya' => 'Biaya Sewa',
        ];
    }
    public function getMobil()
    {
        return $this->hasOne(Mobil::className(), ['id' => 'mobil_id']);
    }
}
