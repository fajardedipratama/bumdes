<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%insentif_detail}}".
 *
 * @property int $id
 * @property int $insentif_id
 * @property int $pengurus_id
 * @property int|null $nominal
 */
class InsentifDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%insentif_detail}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['insentif_id', 'pengurus_id'], 'required'],
            [['insentif_id', 'pengurus_id', 'nominal'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'insentif_id' => 'Insentif',
            'pengurus_id' => 'Pengurus',
            'nominal' => 'Nominal',
        ];
    }
    public function getPengurus()
    {
        return $this->hasOne(LaporanUser::className(), ['id' => 'pengurus_id']);
    }
}
