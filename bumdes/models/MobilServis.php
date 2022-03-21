<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%mobil_servis}}".
 *
 * @property int $id
 * @property string $tgl_servis
 * @property int|null $mobil_id
 * @property string $keterangan
 * @property int|null $biaya
 */
class MobilServis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%mobil_servis}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_servis', 'keterangan'], 'required'],
            [['tgl_servis'], 'safe'],
            [['mobil_id', 'biaya'], 'integer'],
            [['keterangan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl_servis' => 'Tanggal Perawatan',
            'mobil_id' => 'Mobil',
            'keterangan' => 'Keterangan',
            'biaya' => 'Biaya',
        ];
    }
    public function getMobil()
    {
        return $this->hasOne(Mobil::className(), ['id' => 'mobil_id']);
    }
}
