<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%insentif}}".
 *
 * @property int $id
 * @property string|null $tgl_insentif
 * @property string $keterangan
 */
class Insentif extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%insentif}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_insentif'], 'safe'],
            [['keterangan'], 'required'],
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
            'tgl_insentif' => 'Tanggal Insentif',
            'keterangan' => 'Keterangan',
        ];
    }
}
