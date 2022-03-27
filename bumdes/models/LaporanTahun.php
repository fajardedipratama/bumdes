<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%laporan_tahun}}".
 *
 * @property int $id
 * @property string $tahun
 * @property int|null $dana
 */
class LaporanTahun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%laporan_tahun}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun'], 'required'],
            [['dana'], 'integer'],
            [['tahun'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun' => 'Tahun',
            'dana' => 'Dana',
        ];
    }
}
