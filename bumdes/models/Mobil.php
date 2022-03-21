<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mobil}}".
 *
 * @property int $id
 * @property string $merek
 * @property string $nama_pemilik
 * @property string $nopol
 * @property string $no_rangka
 * @property string $no_mesin
 * @property int $tahun
 * @property string $warna
 * @property string $status
 */
class Mobil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%mobil}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['merek', 'nama_pemilik', 'nopol', 'tahun', 'warna'], 'required'],
            [['tahun'], 'integer'],
            [['merek', 'nama_pemilik', 'nopol', 'no_rangka', 'no_mesin', 'warna', 'status'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merek' => 'Merek Mobil',
            'nama_pemilik' => 'Nama Pemilik (STNK)',
            'nopol' => 'No.Polisi',
            'no_rangka' => 'No.Rangka',
            'no_mesin' => 'No.Mesin',
            'tahun' => 'Tahun Beli',
            'warna' => 'Warna Mobil',
            'status' => 'Status',
        ];
    }
}
