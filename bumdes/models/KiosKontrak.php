<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%kios_kontrak}}".
 *
 * @property int $id
 * @property int $kios_id
 * @property string|null $awal_kontrak
 * @property string|null $akhir_kontrak
 * @property int|null $tagihan
 */
class KiosKontrak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%kios_kontrak}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kios_id', 'tagihan'], 'integer'],
            [['awal_kontrak', 'akhir_kontrak'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kios_id' => 'Kios',
            'awal_kontrak' => 'Awal Kontrak',
            'akhir_kontrak' => 'Akhir Kontrak',
            'tagihan' => 'Tagihan',
        ];
    }
    public function getKios()
    {
        return $this->hasOne(Kios::className(), ['id' => 'kios_id']);
    }
}
