<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bgmart}}".
 *
 * @property int $id
 * @property string|null $tgl_setor
 * @property string $nama_setoran
 * @property int|null $jumlah
 */
class Bgmart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bgmart}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_setor'], 'safe'],
            [['tgl_setor','nama_setoran','jumlah'], 'required'],
            [['jumlah'], 'integer'],
            [['nama_setoran'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl_setor' => 'Tanggal Setor',
            'nama_setoran' => 'Judul Setoran',
            'jumlah' => 'Jumlah',
        ];
    }
}
