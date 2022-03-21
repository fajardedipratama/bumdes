<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%laporan}}".
 *
 * @property int $id
 * @property int $bulan
 * @property String $tahun
 * @property string|null $tgl_awal
 * @property string|null $tgl_akhir
 * @property int $dana
 */
class Laporan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%laporan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bulan', 'tahun','tgl_awal','tgl_akhir'], 'required'],
            [['bulan','dana'], 'integer'],
            [['tahun'], 'string', 'max' => 4],
            [['tgl_awal','tgl_akhir'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'tgl_awal' => 'Tanggal Awal',
            'tgl_akhir' => 'Tanggal Akhir',
            'dana' => 'Saldo Bulan Lalu',
        ];
    }
}
