<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%setoran_kios_detail}}".
 *
 * @property int $id
 * @property int $setoran_id
 * @property int $kios_id
 * @property String|null $tgl_setoran
 * @property int|null $tagihan
 * @property int|null $biaya
 */
class SetoranKiosDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%setoran_kios_detail}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['setoran_id', 'kios_id'], 'required'],
            [['setoran_id', 'kios_id', 'tagihan', 'biaya'], 'integer'],
            [['tgl_setoran'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'setoran_id' => 'Setoran ID',
            'kios_id' => 'Kios',
            'tgl_setoran' => 'Tanggal Setoran',
            'tagihan' => 'Tagihan',
            'biaya' => 'Setoran',
        ];
    }
    public function getKios()
    {
        return $this->hasOne(Kios::className(), ['id' => 'kios_id']);
    }
    public function getSetoran()
    {
        return $this->hasOne(SetoranKios::className(), ['id' => 'setoran_id']);
    }
}
