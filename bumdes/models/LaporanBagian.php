<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%laporan_bagian}}".
 *
 * @property int $id
 * @property int|null $tahun_id
 * @property string $keterangan
 * @property int|null $nilai
 * @property int|null $nominal
 * @property string $jenis
 */
class LaporanBagian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%laporan_bagian}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun_id', 'nominal', 'nilai'], 'integer'],
            [['keterangan'], 'required'],
            [['keterangan','jenis'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun_id' => 'Tahun',
            'keterangan' => 'Pembagian',
            'nominal' => 'Nominal',
            'nilai' => 'Nilai',
            'jenis' => 'Jenis',
        ];
    }
    public function getLaptahun()
    {
        return $this->hasOne(LaporanTahun::className(), ['id' => 'tahun_id']);
    }
}
