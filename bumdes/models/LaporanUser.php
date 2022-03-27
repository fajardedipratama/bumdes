<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%laporan_user}}".
 *
 * @property int $id
 * @property string $nama
 * @property string $jabatan
 */
class LaporanUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%laporan_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jabatan'], 'required'],
            [['nama', 'jabatan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'jabatan' => 'Jabatan',
        ];
    }
}
