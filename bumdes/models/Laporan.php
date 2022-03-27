<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%laporan}}".
 *
 * @property int $id
 * @property int $bulan
 * @property int $tahun
 * @property string|null $tgl_awal
 * @property string|null $tgl_akhir
 * @property int $dana
 * @property String $dana_kemarin
 * @property String $dana_tahun_lalu
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
            [['bulan','tahun','dana'], 'integer'],
            [['dana_kemarin','dana_tahun_lalu'], 'string', 'max' => 100],
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
            'dana' => 'Saldo',
            'dana_kemarin' => 'Dana Bulan Lalu ?',
            'dana_tahun_lalu' => 'Dana Tahun Lalu ?',
        ];
    }
}
